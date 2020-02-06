<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Election extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'status', 'description', 'voting_date',
    ];
}
