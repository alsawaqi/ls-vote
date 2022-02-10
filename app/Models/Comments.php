<?php

namespace App\Models;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Propaganistas\LaravelFakeId\RoutesWithFakeIds;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comments extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $perPage = 7;


    public function user(){

        return $this->belongsTo(User::class);
    }



    public function idea(){

        return $this->belongsTo(Idea::class);
    }



}
