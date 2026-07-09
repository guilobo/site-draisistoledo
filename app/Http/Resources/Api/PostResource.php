<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PostResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $isMidia = $this->categories->contains('slug', 'na-midia');
        $publicPath = ($isMidia ? '/na-midia/' : '/blog/') . $this->slug;

        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'status' => $this->status,
            'published_at' => optional($this->published_at)?->toISOString(),
            'tag' => $this->tag,
            'seo_title' => $this->seo_title,
            'seo_description' => $this->seo_description,
            'featured_image_path' => $this->featured_image_path,
            'featured_image_url' => $this->featured_image_path ? url(Storage::url($this->featured_image_path)) : null,
            'public_url' => url($publicPath),
            'categories' => $this->categories->map(fn ($category) => [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
            ])->values()->all(),
            'author' => [
                'id' => $this->author?->id,
                'name' => $this->author?->name,
                'email' => $this->author?->email,
            ],
            'created_at' => optional($this->created_at)?->toISOString(),
            'updated_at' => optional($this->updated_at)?->toISOString(),
        ];
    }
}
