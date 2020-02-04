<?php

namespace App\Http\Controllers;

use App\blockChain;
use Blockavel\LaraBlockIo\LaraBlockIo;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

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
        $blockInfo = $block->getAddressesInfoWithoutBalances();
        $addresses = $blockInfo->data->addresses;
        return $addresses;
    }

    public function createAddress(Request $request)
    {
        $block = new LaraBlockIo();
        $label = $request['newAddress'];
        $block->createAddress($label);
        return redirect('blockchain')->withStatus(__('Address successfully created.'));
    }

    public function withdrawFromLabelsToLabels(Request $request) {
        $amounts = $request['amounts'];
        $from_labels = $request['from_labels'];
        $to_labels = $request['from_labels'];
        $nonce = $request['nonce'];
        $block = new LaraBlockIo();
        $withdraw = $block->withdrawFromLabelsToLabels($amounts, $from_labels, $to_labels, $nonce);
        dd($withdraw);
        return redirect('blockchain')->withStatus(__('amounts withdrawn successfully.'));
    }


}
