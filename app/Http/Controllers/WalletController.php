<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    //addWallet
    public function addWallet(Request $request)
    {
        $data = $request->validate([
            'code' => ['required','string','min:8'],
            'amount' => ['required','numeric','min:2'],
        ]);
        $code = User::where("id",Auth::user()->id)->where("jwt_token",$request->code)->first();
        if($code)
        {
            $addedWallet = $code->wallet+$request->amount;
            User::where('id',Auth::user()->id)->update(['wallet' => $addedWallet]);
            return redirect('user/home');
        }
        return redirect('user/home')->withErrors(['is_match'=>'Invalid Steam code.']);
    }
}
