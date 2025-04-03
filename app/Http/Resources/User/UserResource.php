<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Base\BaseJsonResource;
use Illuminate\Http\Request;

class UserResource extends BaseJsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
        ];
    }
}
