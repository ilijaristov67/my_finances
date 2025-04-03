<?php

namespace App\Http\Controllers\Category;

use App\Http\Actions\Category\UpdateCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class UpdateCategoryController extends Controller
{
    public function __invoke(UpdateCategoryRequest $request, Category $category)
    {
        return UpdateCategory::handle($request, $category);
    }
}
