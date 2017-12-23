<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Post;

class PostUpdateRequest extends FormRequest
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
            'body'      => 'required|min:2',
            'image'     => 'image|mimes:jpeg,png,gif,svg'
        ];
    }

    public function persist(Post $post)
    {
        $imagePathName = $post->image;

        if ($this->hasFile('image')) {
            $imagePath = '/images/blog/';
            $imageName = microtime(true).'.'
                .$this->file('image')->getClientOriginalExtension();

            $this->file('image')->move(
                public_path() . $imagePath, 
                $imageName
            );

            // removing previos image
            if (\File::exists(public_path() . $imagePathName)) {
                \File::delete(public_path() . $imagePathName);
            }

            $imagePathName = $imagePath . $imageName;
        }

        Post::where('id', $post->id)
            ->update([
                'title'     => $this->post('title'),
                'body'      => $this->post('body'),
                'image'     => $imagePathName
        ]);

        session()->flash(
            'message', 'Your post has now been updated!'
        );
    }
}
