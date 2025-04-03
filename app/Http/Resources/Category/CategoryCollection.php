<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Base\BaseResourceCollection;
use Illuminate\Http\Request;

class CategoryCollection extends BaseResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
        ];
    }
}
