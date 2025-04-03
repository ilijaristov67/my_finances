<?php

namespace App\Http\Controllers\Category;

use App\Http\Actions\Category\DeleteCategory;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class DeleteCategoryController extends Controller
{
    public function __invoke(Category $category): JsonResponse
    {
        return DeleteCategory::handle($category);
    }
}
