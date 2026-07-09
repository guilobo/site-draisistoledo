<?php

namespace App\Http\Controllers\Api;

use App\Actions\Posts\UpsertPostAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StorePostRequest;
use App\Http\Requests\Api\UpdatePostRequest;
use App\Http\Resources\Api\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(private readonly UpsertPostAction $upsertPostAction)
    {
    }

    public function store(StorePostRequest $request): JsonResponse
    {
        $this->ensureAbility($request, 'posts:create');

        $post = $this->upsertPostAction->execute(
            post: null,
            data: $request->validated(),
            author: $request->user(),
        );

        return PostResource::make($post)
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdatePostRequest $request, Post $post): PostResource
    {
        $this->ensureAbility($request, 'posts:update');

        $post = $this->upsertPostAction->execute(
            post: $post,
            data: $request->validated(),
            author: $request->user(),
        );

        return PostResource::make($post);
    }

    private function ensureAbility(Request $request, string $ability): void
    {
        abort_unless(
            $request->user() !== null && $request->user()->tokenCan($ability),
            403,
            'This API token does not have the required ability.'
        );
    }
}
