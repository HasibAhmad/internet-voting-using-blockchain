<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Candidate extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email',  'votes', 'description',
    ];

//    protected  $withCount = [
//        'description',
//    ];
}
