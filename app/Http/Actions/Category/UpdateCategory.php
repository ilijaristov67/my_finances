<?php

namespace App\Http\Actions\Category;

use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class UpdateCategory
{
    public static function handle(UpdateCategoryRequest $request, Category $category)
    {
        $updatedCategory = DB::transaction(function () use ($request, $category) {
            $category->update($request->validated());

            return $category->fresh();
        });

        return CategoryResource::make($updatedCategory);
    }
}
