<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'user_id',
        'post_id',
        'body',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that can be nullable.
     * @var array
     */
    protected $nullable = [
    ];

    /**
     * Database relation to user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Database relation to post.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
