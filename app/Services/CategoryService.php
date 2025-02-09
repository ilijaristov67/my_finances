<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Collection;

class CategoryService
{
    public function __construct(protected CategoryRepository $categoryRepository)
    {}

    public function getAllCategories(): Collection
    {
        return $this->categoryRepository->getAllCategories();
    }

    public function getSingleCategory(Category $category): Category
    {
        return $category;
    }

    public function storeCategory(array $data): Category
    {
        return $this->categoryRepository->storeCategory($data);
    }

    public function deleteCategory(Category $category): bool
    {
        return (bool) $this->categoryRepository->deleteCategory($category);
    }

    public function updateCategory(Category $category, array $data): Category
    {
        return $this->categoryRepository->updateCategory($category, $data);
    }
}
