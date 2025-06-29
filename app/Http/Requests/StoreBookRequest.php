<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'authorId' => 'required|exists:authors,id',
            'publicationYear' => 'required|integer|digits:4',
            'genre' => 'required|string|max:100',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
        ];
    }
}
