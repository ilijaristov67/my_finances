<?php

namespace App\Http\Controllers\Category;

use App\Http\Actions\Category\StoreCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;

class StoreCategoryController extends Controller
{
    public function __invoke(StoreCategoryRequest $request)
    {
        return StoreCategory::handle($request);
    }
}
