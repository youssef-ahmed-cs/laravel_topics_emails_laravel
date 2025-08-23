<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ID' => $this->id,
            'Title' => $this->title,
            'Description' => $this->description,
            'Author_id' => $this->author_id,
            'Publication_date' => $this->publication_date,
            'Isbn' => $this->isbn,
            'Created_at' => $this->created_at,
        ];
    }
}
