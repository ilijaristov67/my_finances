<?php

namespace App\Http\Actions\Category;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class StoreCategory
{
    public static function handle(StoreCategoryRequest $request): CategoryResource
    {
        $category = DB::transaction(function () use ($request) {
            return Category::create([
                'category' => $request->category,
            ]);
        });

        return CategoryResource::make($category);
    }
}
