<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'image',
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
        'image',
    ];

    /**
     * Database relation to user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
