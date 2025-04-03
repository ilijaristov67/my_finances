<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Base\BaseJsonResource;
use Illuminate\Http\Request;

class CategoryResource extends BaseJsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category' => $this->category,
        ];
    }
}
