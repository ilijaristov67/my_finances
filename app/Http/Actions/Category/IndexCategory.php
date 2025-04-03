<?php

namespace App\Http\Actions\Category;

use App\Http\Requests\BaseIndexRequest;
use App\Http\Resources\Category\CategoryCollection;
use App\Models\Category;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class IndexCategory
{
    public static function handle(BaseIndexRequest $request): CategoryCollection
    {
        $categories = QueryBuilder::for(Category::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::partial('category'),
            ])
            ->paginate(
                perPage: $request->limit,
                page: $request->page
            );

        return CategoryCollection::make($categories);
    }
}
