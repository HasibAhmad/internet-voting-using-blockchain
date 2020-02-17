<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Voter extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'public_key', 'election_id', 'bitcoin_address', 'network', 'verify_token',
    ];

    public function election() {
        return $this->belongsTo(Election::class, 'election_id');
    }
}
