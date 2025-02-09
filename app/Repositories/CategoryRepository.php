<?php

namespace App\Repositories;

use App\Http\Resources\CategoryCollection;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    public function getAllCategories(): Collection
    {
        return Category::all();
    }

    public function storeCategory(array $data): Category
    {
        return DB::transaction(function () use ($data) {
            return Category::create($data);
        }); 
    }

    public function deleteCategory(Category $category): bool
    {
        return DB::transaction(fn() => $category->delete());
    }

    public function updateCategory(Category $category, array $data): Category
    {
        return DB::transaction(fn() => tap($category)->update($data));
    }
}
