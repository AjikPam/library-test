<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BookPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'isbn'=>'required|string|max:13',
            'title'=>'required|string|max:250',
            'author'=>'required|string|max:150',
            'image_path'=>'required|string|max:150',
            'publisher'=>'required|string|max:50',
            'category'=>'required|string|max:50',
            'pages'=>'required|numeric',
            'language'=>'required|string|max:20',
            'publish_date'=>'required|date',
            'subjects'=>'required|string|max:50',
            'description'=>'required|string',
        ];
    }
}
