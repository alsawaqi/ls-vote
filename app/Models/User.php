<?php

namespace App\Models;

use App\Models\Idea;
use App\Models\Comments;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function ideas(){

        return $this->hasMany(Idea::class);
    }


    public function comments(){

        return $this->hasMany(Comments::class);
    }




    public function getAvatar(){

        $firstCharacter = $this->email[0];


        if (is_numeric($firstCharacter)) {
            $integerToUse = ord(strtolower($firstCharacter)) - 21;
        } else {
            $integerToUse = ord(strtolower($firstCharacter)) - 96;
        }

     //   $randomInteger = rand(1, 36);

        return 'https://www.gravatar.com/avatar/'
                .md5($this->email)
                .'?s=200'
                .'&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-'
                .$integerToUse
                .'.png';
    }


    public function isAdmin(){

         return in_array($this->email,['buzz644@yahoo.com']);

    }



    public function votes(){

         return $this->belongsToMany(Idea::class, 'votes');

    }

}
