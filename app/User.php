<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function uploadAvatar($image) {
        $filename = $image->getClientOriginalName();
        (new self())->deleteOldAvatar();
        $image->storeAs('images/avatar', $filename, 'public');
        auth()->user()->update(['avatar' => $filename]);
    }

    protected function deleteOldAvatar() {
        if (auth()->user()->avatar) {
            Storage::delete('/public/images/avatar/' . auth()->user()->avatar);
        }
    }
}
