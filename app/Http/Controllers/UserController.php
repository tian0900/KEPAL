<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Events\Auth\UserActivationEmail;
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

    public function postResend(Request $request)
    {
        $this->validates($request);

        $user = User::where('email', $request->email)->first();

        //send email
        event(new UserActivationEmail($user));

        Alert::success('Success', 'Registrasi berhasil silahkan cek email untuk aktivasi!');
        return redirect('/verification');
    }

    protected function validates(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ],[
            'email.exists' => 'Email tidak ditemukan'
        ]);
    }
}
