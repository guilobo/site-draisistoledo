<?php

namespace App\Http\Requests\Api;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('posts', 'slug')],
            'excerpt' => ['nullable', 'string', 'max:1000'],
            'content' => ['required_without:youtube_url', 'nullable', 'string'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['string', Rule::exists('categories', 'slug')],
            'youtube_url' => ['nullable', 'url', 'max:500'],
            'featured_image' => ['nullable', 'image', 'max:4096'],
            'status' => ['required', Rule::in(array_keys(Post::STATUS_OPTIONS))],
            'published_at' => ['nullable', 'date'],
            'tag' => ['nullable', 'string', 'max:100'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:500'],
        ];
    }
}
