<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreCategoryRequest;
use App\Http\Resources\Api\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $this->ensureAbility($request, 'categories:view');

        return CategoryResource::collection(
            Category::query()
                ->orderBy('name')
                ->get()
        );
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $this->ensureAbility($request, 'categories:create');

        $category = Category::create($request->validated());

        return CategoryResource::make($category)
            ->response()
            ->setStatusCode(201);
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
