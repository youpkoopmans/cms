<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
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
     * Database relation to users.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
