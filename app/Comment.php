<?php

namespace App;

use App\Post;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'user_id','post_id','body','active'
    ];

    public function post()
    {
    	return $this->belongsTo(Post::class );
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
