<?php

namespace App;

use App\User;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'user_id','name','slug','description','url','active'
    ];

    public function comment()
    {
    	return $this->hasMany(Comment::Class);
    }

    public function user()
    {
    	return $this->belongsTo(User::Class);
    }

}
