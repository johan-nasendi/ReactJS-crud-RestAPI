<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Login as LoginResources;

use App\User;
use DB;
class LoginAllController extends Controller
{
    public function index()
    {
        return LoginResources::collection(User::all());
    }

    public function sign(Request $request)
    {
      // echo "$request->email.$request->password "; die;
    	if(Auth::attempt($request->only('username','password'))){
            $akun = DB::table('users')->where('username', $request->username)->first();
            if($akun->role =='admin'){
                return redirect('/home')->with('status'," Anda Berhasil Login | SELAMAT DATANG {{auth::users()->name}} ");

            } else if($akun->role =='user'){
                return redirect('/dashboard')->with('status','Anda Berhasil Login | SELAMAT DATANG');

          

            // }elseif ($akun->role =='Dosen') {
            //   Auth::guard('dosen')->LoginUsingId($akun->id);
            //   return redirect('/berandadosen')->with('sukses','Anda Berhasil Login');
            // }elseif ($akun->role =='Asisten Laboratorium') {
            //   Auth::guard('aslab')->LoginUsingId($akun->id);
            //   return redirect('/berandaaslab')->with('sukses','Anda Berhasil Login');
            // }elseif ($akun->role =='Asisten Praktikum') {
            //   Auth::guard('asprak')->LoginUsingId($akun->id);
            //   return redirect('/berandasprak')->with('sukses','Anda Berhasil Login');
            // }elseif ($akun->role =='Praktikan') {
            //   Auth::guard('praktikan')->LoginUsingId($akun->id);
            //   return redirect('/berandapraktikan')->with('sukses','Anda Berhasil Login');
             }
    	}
        return redirect('/login')->with('status',' Email & Password Salah :( | <b>Coba Lagi</b>');
    }
    
}
