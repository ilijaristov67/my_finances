<?php

namespace App\Http\Controllers\Category;

use App\Http\Actions\Category\IndexCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\BaseIndexRequest;

class IndexCategoryController extends Controller
{
    public function __invoke(BaseIndexRequest $request)
    {
        return IndexCategory::handle($request);
    }
}
