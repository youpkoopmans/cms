<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that can be nullable.
     * @var array
     */
    protected $nullable = [
    ];

    /**
     * Database relation to roles.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Database relation to posts.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Database relation to comments.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function checkRoles($roles)
    {
        if ( ! is_array($roles)) {
            $roles = [$roles];
        }

        if ( ! $this->hasAnyRole($roles)) {
            auth()->logout();
            abort(404);
        }
    }

    public function hasAnyRole($roles): bool
    {
        return (bool) $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role): bool
    {
        return (bool) $this->roles()->where('name', $role)->first();
    }

}
