<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use Mail; 
use Hash;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    //
    public function showForgetPasswordForm()
    {
        return view('pages.auth.forgot');
    }
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        if(User::where('email', '=', $request->email)->count() > 0){
            DB::table('password_resets')->insert([
                'email' => $request->email, 
                'token' => $token, 
                'created_at' => Carbon::now()
            ]);
            // return redirect('login');
            Mail::send('pages.auth.email', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
            
            
            // return redirect("login")->with('message','Kami Telah mengirim email reset password, mohon untuk mengecek kotak masuk / kotak spam email anda.');
            });
            return redirect()->back()->with('message', ' Kami Telah mengirim email reset password, mohon untuk mengecek kotak masuk / kotak spam email anda.');
        }else{
            return redirect()->back()->with('error','Email tidak terdaftar');
        }
    }
    public function showResetPasswordForm($token) { 
        $email = DB::table('password_resets')
                            ->where([
                            'token' => $token
                            ])
                            ->get();
                            $email = $email[0]->email;
        return view('pages.auth.forgotlink', ['token' => $token])->with('email', $email);
    }
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                            'email' => $request->email, 
                            'token' => $request->get('token')
                            ])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/login')->with('message', 'Password telah diubah! Silahkan login dengan password baru anda');
    }
}
