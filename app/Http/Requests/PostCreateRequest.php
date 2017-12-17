<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Post;

class PostCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'author' => 'required',
            'body'  => 'required'
        ];
    }

    public function persist()
    {
        Post::create(
            $this->only(['title', 'author', 'body'])
        );

        session()->flash(
            'message', 'Your post has now been published.'
        );
    }
}
