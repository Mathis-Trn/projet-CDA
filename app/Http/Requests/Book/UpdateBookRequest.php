<?php

namespace App\Http\Requests\Book;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'cover' => 'required|string',
            'description' => 'required|string',
            'editor_id' => 'required|exists:editors,id',
            'author_id' => 'required|exists:authors,id',
            'published_at' => 'required|date',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => true,
            'message' => 'Erreur de validation',
            'errorsList' => $validator->errors()
        ]));
    }

    public function messages()
    {

        return [
            'name.required' => 'Le nom est obligatoire',
            'name.string' => 'Le nom doit être une chaîne de caractères',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères',
            'description.required' => 'La description est obligatoire',
            'description.string' => 'La description doit être une chaîne de caractère',
            'description.max' => 'La description ne doit pas dépasser 255 caractères',
            'editor_id.required' => 'L\'éditeur est obligatoire',
            'editor_id.exists' => 'L\'éditeur n\'existe pas',
            'author_id.required' => 'L\'auteur est obligatoire',
            'author_id.exists' => 'L\'auteur n\'existe pas',
            'published_at.required' => 'La date de publication est obligatoire',
            'published_at.date' => 'La date de publication doit être une date valide',
            'cover.required' => 'L\'image est obligatoire',
            'cover.string' => 'L\'image doit être une chaîne de caractères',
        ];
    }
}
