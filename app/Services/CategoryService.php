<?php

namespace App\Services;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    public function getAllCategories(): CategoryCollection
    {
        return new CategoryCollection(Category::all());
    }

    public function getSingleCategory(Category $category): Category
    {
        return $category;
    }

    public function storeCategory(StoreCategoryRequest $request): Category
    {
        return DB::transaction(function () use ($request) {
            return Category::create($request->toArray());
        });
    }

    public function deleteCategory(Category $category): bool
    {
        return DB::transaction(fn() => $category->delete());
    }

    public function updateCategory(Category $category, UpdateCategoryRequest $request): CategoryResource
    {
        return CategoryResource::make(
            DB::transaction(fn() => tap($category, fn($c) => $c->update($request->toArray())))
        );

    }
}
