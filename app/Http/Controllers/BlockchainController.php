<?php

namespace App\Http\Controllers;

use App\blockChain;
use Blockavel\LaraBlockIo\LaraBlockIo;
use Illuminate\Http\Request;

class BlockchainController extends Controller
{
    public function index()
    {
        $block = new LaraBlockIo();
        $network = $block->getNetwork();
        $networkBalance = $block->getAvailableBalance();
        $addresses = $this->getAddress();
        return view('pages.blockchain', ['network' => $network, 'networkBalance' => $networkBalance,
            'addresses' => $addresses]);
    }

    public function getAddress()
    {
        $block = new LaraBlockIo();
//        $block->createAddress('default');
        $blockInfo = $block->getAddressesInfoWithoutBalances();
        $addresses = $blockInfo->data->addresses;
//        dd($addresses[0]->address);
        return $addresses;
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
