<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon;

class AkunController extends Controller
{
    public function profilmitra()
    {
      return view('halaman.profilmitra');
    }

    public function profilsupplier()
    {
      return view('halaman.profilsupplier');
    }

    public function update(Request $request,$id)
    {
      $user = \App\User::find($id);
      $now = Carbon\Carbon::now();

      $request->validate([
            'nama_lengkap'  => 'required|min:5|max:20',
            'email'         => 'required|email|max:30',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'alamat'        => 'required|max:50',
            'no_hp'         => 'required|min:10|max:12',
        ],[
            'no_hp.required' => 'Minimal 10 digit',
        ]);

      if ($request->no_hp == 0) {
        return redirect('/profilmitra')->with('danger', 'No HP tidak boleh 0');
      }

      if ($request->tanggal_lahir > $now) {
        return redirect('/profilmitra')->with('danger', 'Tanggal lahir tidak valid');
      }

      $user->update($request->all());
      
      if($request->hasFile('avatar')){
        $request->validate([
            'avatar'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'avatar.required' => 'Harus dalam ekstensi foto dan tidak melibihi 2 MB',
        ]);

        $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
        $user->avatar = $request->file('avatar')->getClientOriginalName();
        $user->save();
      }
      
      return redirect('/profilmitra')->with('success','Data Berhasil diupdate');
    }

    public function update2(Request $request,$id)
    {
      $user = \App\pengguna::find($id);
      $now = Carbon\Carbon::now();

      $request->validate([
            'nama_lengkap'  => 'required|min:5|max:20',
            'email'         => 'required|email',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'alamat'        => 'required|max:50',
            'no_hp'         => 'required|min:10|max:12',
        ],[
            'no_hp.required' => 'Minimal 10 digit',
        ]);

      if ($request->no_hp == 0) {
        return redirect('/profilsupplier')->with('danger', 'No HP tidak boleh 0');
      }

      if ($request->tanggal_lahir > $now) {
        return redirect('/profilsupplier')->with('danger', 'Tanggal lahir tidak valid');
      }

      $user->update($request->all());

      if($request->hasFile('avatar')){
        $request->validate([
            'avatar'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'avatar.required' => 'Harus dalam ekstensi foto dan tidak melibihi 2 MB',
        ]);
        
      $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
      $user->avatar=$request->file('avatar')->getClientOriginalName();

      $user->save();
    }
    return redirect('/profilsupplier')->with('success','Data Berhasil diupdate');
    }
}