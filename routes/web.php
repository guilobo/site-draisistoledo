<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;

Route::get('/', function () {
    $posts = Post::where('status', 'published')
        ->orderBy('published_at', 'desc')
        ->with('categories')
        ->take(3)
        ->get();

    $midiaCategory = Category::where('slug', 'na-midia')->first();
    $midiaHighlights = $midiaCategory
        ? Post::where('status', 'published')
            ->whereHas('categories', fn ($q) => $q->where('categories.id', $midiaCategory->id))
            ->orderBy('published_at', 'desc')
            ->take(6)
            ->get()
        : collect();

    return view('welcome', compact('posts', 'midiaHighlights'));
});

// Na Mídia
Route::get('/na-midia', function () {
    $midiaCategory = Category::where('slug', 'na-midia')->first();

    $posts = $midiaCategory
        ? Post::where('status', 'published')
            ->whereHas('categories', fn ($q) => $q->where('categories.id', $midiaCategory->id))
            ->orderBy('published_at', 'desc')
            ->paginate(12)
        : collect()->paginate(12);

    return view('midia.index', compact('posts'));
})->name('midia.index');

Route::get('/na-midia/{slug}', function (string $slug) {
    $midiaCategory = Category::where('slug', 'na-midia')->first();

    $post = Post::where('slug', $slug)
        ->where('status', 'published')
        ->firstOrFail();

    $related = $midiaCategory
        ? Post::where('status', 'published')
            ->where('id', '!=', $post->id)
            ->whereHas('categories', fn ($q) => $q->where('categories.id', $midiaCategory->id))
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get()
        : collect();

    return view('midia.show', compact('post', 'related'));
})->name('midia.show');

// Blog
Route::get('/blog', function () {
    $posts = Post::where('status', 'published')
        ->orderBy('published_at', 'desc')
        ->with('categories')
        ->paginate(9);

    return view('blog.index', compact('posts'));
})->name('blog.index');

Route::get('/blog/{slug}', function (string $slug) {
    $post = Post::where('slug', $slug)
        ->where('status', 'published')
        ->with('categories')
        ->firstOrFail();

    return view('blog.show', compact('post'));
})->name('blog.show');
