<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function verification(){
        return view('auth.verification');
    }

    public function postverification(Request $request){
        $user = User::where('token_activation',$request->otp)->first();
        if($user==null){
            Alert::Warning('Error', 'Kode OTP salah. Silahkan coba kembali!');
            return redirect()->back();
        }else{
            $user->update([
                'isVerified' => true,
                'token_activation' => null
            ]);
            Alert::success('Success', 'Terimakasih Akun Anda sudah aktif!');
            return redirect('login');
        }
    }
}
