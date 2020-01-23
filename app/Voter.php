<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Voter extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'private_key', 'bitcoin_address', 'network',
    ];
}
