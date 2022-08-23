<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateBookRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required|min:20',
            'isbn' => 'required|regex:/[0-9]+/|digits:13',
            'page_count' => 'required|integer',
            'publish_date' => 'required|date',
            'author_id' => 'required|exists:authors,id',
            'binding_id' => 'required|exists:bindings,id',
            'category_id' => 'required|exists:categories,id',
            'genre_id' => 'required|exists:genres,id',
            'publisher_id' => 'required|exists:publishers,id',
            'script_id' => 'required|exists:scripts,id',
            'size_id' => 'required|exists:sizes,id',
            'total_count' => 'required|integer',
            'picture' => 'sometimes'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('Title is required.'),
            'content.required' => __('Content is required.'),
            'content.min' => __('Content must be at least 10 characters.'),
            'isbn.required' => __('ISBN is required.'),
            'isbn.regex' => __('ISBN format is invalid.'),
            'isbn.digits' => __('ISBN must have 13 digits.'),
            'page_count.required' => __('Number of pages is required.'),
            'page_count.integer' => __('Number of pages must be an integer.'),
            'publish_date.required' => __('Date of publishing is required.'),
            'publish_date.date' => __('Date of publishing must be a date.'),
            'author_id.required' => __('Author is required.'),
            'author_id.exists' => __('Select an existing author.'),
            'binding_id.required' => __('Binding is required.'),
            'binding_id.exists' => __('Select an existing binding.'),
            'category_id.required' => __('Category is required.'),
            'category_id.exists' => __('Select an existing category.'),
            'genre_id.required' => __('Genre is required.'),
            'genre_id.exists' => __('Select an existing genre.'),
            'publisher_id.required' => __('Publisher is required.'),
            'publisher_id.exists' => __('Select an existing publisher.'),
            'script_id.required' => __('Script is required.'),
            'script_id.exists' => __('Select an existing script.'),
            'size_id.required' => __('Size is required.'),
            'size_id.exists' => __('Select an existing size.'),
            'total_count.required' => __('Total number of books is required.'),
            'total_count.integer' => __('Total number of books must be an integer.')
        ];
    }
}
