<?php

namespace App;

use Blockavel\LaraBlockIo\LaraBlockIo;
use Illuminate\Database\Eloquent\Model;

class blockChain extends Model
{
    public function getBlock()
    {
        $block = new LaraBlockIo();
        return $block;
    }

    public static function demo()
    {
        return 'method called';
    }
}
