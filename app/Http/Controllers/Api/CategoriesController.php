<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoriesController extends Controller
{
    public function __construct(protected CategoryService $categoryService)
    {}

    public function index(): CategoryCollection
    {
        return $this->categoryService->getAllCategories();
    }

    public function show(Category $category): CategoryResource
    {
        return CategoryResource::make($this->categoryService->getSingleCategory($category));
    }

    public function store(StoreCategoryRequest $request)
    {
        return CategoryResource::make($this->categoryService->storeCategory($request));
    }

    public function destroy(Category $category): JsonResponse
    {
        return $this->categoryService->deleteCategory($category)
            ? response()->json(['message' => 'Category deleted successfully'], 200)
            : response()->json(['message' => 'Failed to delete category'], 500);
    }

    public function update(Category $category, UpdateCategoryRequest $request): CategoryResource
    {
        return $this->categoryService->updateCategory($category, $request);
    }
}
