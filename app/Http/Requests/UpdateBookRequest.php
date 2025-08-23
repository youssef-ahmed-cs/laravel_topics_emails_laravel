<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'author_id' => 'sometimes|required|exists:users,id',
            'publication_date' => 'sometimes|nullable|date',
            'isbn' => 'sometimes|nullable|string|max:13',
        ];
    }
}
