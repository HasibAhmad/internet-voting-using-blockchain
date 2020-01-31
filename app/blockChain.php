<?php

namespace App;

use Blockavel\LaraBlockIo\LaraBlockIo;
use Illuminate\Database\Eloquent\Model;

class blockChain extends Model
{
    public function test()
    {
        $block = new LaraBlockIo();
        $info = $block->getBalanceInfo();
        dd($info);
        return $info;
    }
}
