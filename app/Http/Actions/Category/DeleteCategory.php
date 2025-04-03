<?php

namespace App\Http\Actions\Category;

use App\Models\Category;
use Illuminate\Http\JsonResponse;

class DeleteCategory
{
    public static function handle(Category $category): JsonResponse
    {
        return $category->delete()
            ? response()->json(['message' => 'Category deleted successfully'], 200)
            : response()->json(['message' => 'Failed to delete category'], 500);
    }
}
