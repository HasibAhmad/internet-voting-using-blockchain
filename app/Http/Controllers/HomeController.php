<?php

namespace App\Http\Controllers;

use App\blockChain;
use Blockavel\LaraBlockIo\LaraBlockIo;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $block = new LaraBlockIo();
        $network = $block->getNetwork();
        $networkBalance = $block->getAvailableBalance();
        return view('dashboard', ['network' => $network, 'networkBalance' => $networkBalance]);
    }
}
