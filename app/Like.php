<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	protected $guarded = [];

	protected $casts =[
		'like_value' => 'boolean',
	];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
