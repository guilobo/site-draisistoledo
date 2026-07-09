<?php

namespace App\Http\Requests\Api;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
        /** @var Post $post */
        $post = $this->route('post');

        return [
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'slug' => ['sometimes', 'nullable', 'string', 'max:255', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => ['sometimes', 'nullable', 'string', 'max:1000'],
            'content' => ['sometimes', 'nullable', 'string'],
            'categories' => ['sometimes', 'array'],
            'categories.*' => ['string', Rule::exists('categories', 'slug')],
            'youtube_url' => ['sometimes', 'nullable', 'url', 'max:500'],
            'featured_image' => ['sometimes', 'nullable', 'image', 'max:4096'],
            'status' => ['sometimes', 'required', Rule::in(array_keys(Post::STATUS_OPTIONS))],
            'published_at' => ['sometimes', 'nullable', 'date'],
            'tag' => ['sometimes', 'nullable', 'string', 'max:100'],
            'seo_title' => ['sometimes', 'nullable', 'string', 'max:255'],
            'seo_description' => ['sometimes', 'nullable', 'string', 'max:500'],
        ];
    }
}
