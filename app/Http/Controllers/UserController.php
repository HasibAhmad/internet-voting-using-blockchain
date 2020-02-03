<?php

namespace App\Http\Controllers;

use App\blockChain;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

   public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, User  $user)
    {
        $hasPassword = $request->get('password');
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$hasPassword ? '' : 'password']
        ));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
//
//    public function testBlockChain() {
//        $blockChain = new blockChain();
//        $blockChainTest =  $blockChain->getBlock();
//        //you can call all method ob blockhain on the above variable
//        $myBalance = $blockChainTest->getBalanceInfo();
//        $network = $myBalance->data->network;
//        $networkBalance = $myBalance->data->available_balance;
//        return view('pages.blockchain', ['network' => $network, 'networkBalance' => $networkBalance]);
//
////        $myNetwork = $blockChainTest->getNetwork();
////        $myAddress = $blockChainTest->getAddresses();
////        $myBalance = $blockChainTest->getBalanceInfo();
////        $blockInfo = [
////            'Network' => $myNetwork,
////            'Address' => $myAddress,
////            'Balance' => $myBalance
////        ];
////        return response()->json($blockInfo);
////        return response(["blockChainTest" => $blockChainTest->status]);
//    }
}
