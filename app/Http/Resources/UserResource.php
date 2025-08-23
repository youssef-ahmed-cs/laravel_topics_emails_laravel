<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use \App\Models\User;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'ID' => $this->id,
            'Name' => $this->name,
            'Email' => $this->email,
            'Created At' => $this->created_at,
            'Updated At' => $this->updated_at,
            'roles' => $this->role,
            'phones' => $this->phone
        ];
    }
    public function with($request)
    {
        return [
            'meta' => [
                'total_users' => User::count(),
                'author' => "Youssef API v1"
            ]
        ];
    }
}
