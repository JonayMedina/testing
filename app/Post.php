<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'user_id','name','slug','description','url','active'
    ];

    public function comment()
    {
    	return $this->belongsToMany(Comment::Class);
    }

    public function user()
    {
    	return $this->belongsTo(User::Class);
    }

}
