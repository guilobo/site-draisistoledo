<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        $youtubeUrl = trim($data['youtube_url'] ?? '');
        unset($data['youtube_url']);

        if (filled($youtubeUrl)) {
            $videoId = $this->extractYoutubeId($youtubeUrl);
            if ($videoId) {
                $data['content'] = $this->buildYoutubeEmbed($videoId);
            }
        }

        return $data;
    }

    private function extractYoutubeId(string $url): ?string
    {
        if (preg_match('/^[a-zA-Z0-9_-]{11}$/', $url)) {
            return $url;
        }
        if (preg_match('/(?:v=|embed\/|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $m)) {
            return $m[1];
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
