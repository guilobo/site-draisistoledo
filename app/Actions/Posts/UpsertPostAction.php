<?php

namespace App\Actions\Posts;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;

class UpsertPostAction
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function execute(?Post $post, array $data, User $author): Post
    {
        $post ??= new Post();

        $isNew = ! $post->exists;
        $categories = Arr::pull($data, 'categories');
        $youtubeUrl = trim((string) Arr::pull($data, 'youtube_url', ''));
        $featuredImage = Arr::pull($data, 'featured_image');

        if ($isNew) {
            $post->user_id = $author->id;
        }

        if ($featuredImage instanceof UploadedFile) {
            $data['featured_image_path'] = $featuredImage->store('posts/featured', 'public');
        }

        if ($youtubeUrl !== '') {
            $videoId = $this->extractYoutubeId($youtubeUrl);

            if ($videoId !== null) {
                $data['content'] = $this->buildYoutubeEmbed($videoId);
            }
        } elseif (
            ! $isNew
            && array_key_exists('content', $data)
            && empty(strip_tags((string) $data['content']))
            && str_contains((string) $post->content, 'youtube.com/embed')
        ) {
            // Preserve existing embed HTML when editing a video post without new rich text content.
            $data['content'] = $post->content;
        }

        foreach ([
            'title',
            'slug',
            'excerpt',
            'content',
            'featured_image_path',
            'status',
            'published_at',
            'tag',
            'seo_title',
            'seo_description',
        ] as $attribute) {
            if (array_key_exists($attribute, $data)) {
                $post->{$attribute} = $data[$attribute];
            }
        }

        if (blank($post->slug) && filled($post->title)) {
            $post->slug = \Illuminate\Support\Str::slug($post->title);
        }

        $post->save();

        if (is_array($categories)) {
            $categoryIds = Category::query()
                ->whereIn('slug', $categories)
                ->pluck('id')
                ->all();

            $post->categories()->sync($categoryIds);
        }

        return $post->fresh(['categories', 'author']);
    }

    private function extractYoutubeId(string $url): ?string
    {
        if (preg_match('/^[a-zA-Z0-9_-]{11}$/', $url)) {
            return $url;
        }

        if (preg_match('/(?:v=|embed\/|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
            return $matches[1];
        }

        return null;
    }

    private function buildYoutubeEmbed(string $videoId): string
    {
        return '<div class="media-video-embed">'
            . '<iframe src="https://www.youtube.com/embed/' . $videoId . '" '
            . 'frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>'
            . '</div>';
    }
}
