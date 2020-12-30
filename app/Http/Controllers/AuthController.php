<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function login()
    {
      return view('auth.login');
    }

    public function register()
    {
      return view('auth.register');
    }

    public function postlogin(Request $request)
    {
      // dd($request->all());
      if(Auth::guard('pengguna')->attempt(['email'=> $request->email, 'password'=> $request->password])){
        // $this->validate($request,[
        //   'password' => 'required|password|same:$request->password',
        // ]);
        return redirect('/dashboard');
      }elseif (Auth::guard('user')->attempt(['email'=> $request->email, 'password'=> $request->password])) {
        return redirect('/dashboard');
      }
      return redirect('/login')->with('danger', 'Email dan Password tidak sesuai');
    }

    public function postregister(Request $request)
    {
      $now = Carbon\Carbon::now();
      
      $this->validate($request,[
        'nama_lengkap'  => 'required|min:5|max:20',
        'email'         => 'required|email|unique:pengguna|max:30',
        'jenis_kelamin' => 'required',
        'tanggal_lahir' => 'required',
        'alamat'        => 'required|max:50',
        'no_hp'         => 'required|min:10|max:12',
        'password'      => 'required|max:15',
        'confirmation'  => 'required|same:password',
      ]);

      
      //insert ke tabel pengguna
      $pengguna = new \App\pengguna;
      $pengguna->level          = 'supplier';
      $pengguna->nama_lengkap   = $request->nama_lengkap;
      $pengguna->jenis_kelamin  = $request->jenis_kelamin;
      $pengguna->alamat         = $request->alamat;
      $pengguna->tanggal_lahir  = $request->tanggal_lahir;
      $pengguna->no_hp          = $request->no_hp;
      $pengguna->email          = $request->email;
      $pengguna->password       = bcrypt($request->password);
      $pengguna->remember_token = Str::random(60);

      if ($request->tanggal_lahir > $now ) {
        return redirect('/register')->with('danger','Tanggal Lahir tidak valid');
      }

      $pengguna->save();

      return redirect('/login')->with('success','Pendaftaran Berhasil');
    }

    public function logout(Request $request)
    {
      if(Auth::guard('pengguna')->check()){
        Auth::guard('pengguna')->logout();
      }elseif(Auth::guard('user')->check()){
        Auth::guard('user')->logout();
      }
      return redirect('/');
    }

}
