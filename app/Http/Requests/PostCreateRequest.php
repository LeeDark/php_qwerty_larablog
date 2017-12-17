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
            'title'     => 'required|min:2',
            'author'    => 'required|min:2',
            'body'      => 'required|min:2',
            'image'     => 'required|image|mimes:jpeg,png,gif,svg'
        ];
    }

    public function persist()
    {
        $imagePath = '/images/blog/';
        $imageName = microtime(true).'.'
            .$this->file('image')->getClientOriginalExtension();

        $this->file('image')->move(
            public_path() . $imagePath, 
            $imageName
        );

        Post::create([
            'title'     => $this->post('title'),
            'author'    => $this->post('author'),
            'body'      => $this->post('body'),
            'image'     => $imagePath . $imageName
        ]);

        session()->flash(
            'message', 'Your post has now been published.'
        );
    }
}
