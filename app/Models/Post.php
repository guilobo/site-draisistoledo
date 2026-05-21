<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

#[Fillable([
    'user_id',
    'title',
    'slug',
    'excerpt',
    'content',
    'featured_image_path',
    'tag',
    'status',
    'published_at',
    'seo_title',
    'seo_description',
])]
class Post extends Model
{
    use SoftDeletes;

    public const STATUS_DRAFT = 'draft';

    public const STATUS_PUBLISHED = 'published';

    public const STATUS_ARCHIVED = 'archived';

    public const STATUS_OPTIONS = [
        self::STATUS_DRAFT => 'Rascunho',
        self::STATUS_PUBLISHED => 'Publicado',
        self::STATUS_ARCHIVED => 'Arquivado',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Post $post): void {
            if (blank($post->slug) && filled($post->title)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }
}
