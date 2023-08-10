<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasukController extends Controller
{
    public function halamanMasuk() {
        return view('auth.login');
    }
    
    public function requestMasuk(Request $request) {
        $this->validate($request, [
            'idOrEmail'    => 'required',
            'password' => 'required',
        ]);
    
        $login_type = filter_var($request->input('idOrEmail'), FILTER_VALIDATE_EMAIL ) 
            ? 'email' 
            : 'id_user';
    
        $request->merge([
            $login_type => $request->input('idOrEmail')
        ]);
    
        if (Auth::attempt($request->only($login_type, 'password'))) {
            $selectUser = User::where('email', $request->input('idOrEmail'))
                                ->orWhere('id_user', $request->input('idOrEmail'))
                                ->first();
            $institusi = $selectUser->institusi;
            $role = $selectUser->role;
            switch ($institusi) {
                case 'PM':
                    switch ($role) {
                        case 'SuperAdmin':
                            return redirect('/admin')->with(['success' => 'Super Admin berhasil Masuk!']);
                            break;
                        case 'Admin':
                            return redirect('/admin')->with(['success' => 'Admin berhasil Masuk!']);
                            break;
                        case 'Pengurus':
                            return redirect('/ymp/pengurus')->with(['success' => 'Pengurus berhasil Masuk!']);
                            break;
                        case 'Lokasi':
                            return redirect('/ymp/ketua-lokasi')->with(['success' => 'Ketua Lokasi berhasil Masuk!']);
                            break;
                        case 'Ketua Kelompok':
                            return redirect('/ymp/lembaga')->with(['success' => $role.' berhasil Masuk!']);
                            break;
                    }
                    # code...
                    break;
                
                default:
                    switch ($role) {
                        case 'SuperAdmin':
                            return redirect('/admin')->with(['success' => 'Super Admin berhasil Masuk!']);
                            break;
                        case 'Admin':
                            return redirect('/admin')->with(['success' => 'Admin berhasil Masuk!']);
                            break;
                        case 'Pengurus':
                            return redirect('/gkp/pengurus')->with(['success' => 'Pengurus berhasil Masuk!']);
                            break;
                        case 'Lokasi':
                            return redirect('/gkp/ketua-lokasi')->with(['success' => 'Ketua Lokasi berhasil Masuk!']);
                            break;
                        case 'Kelompok':
                            return redirect('/gkp/ketua-kelompok')->with(['success' => 'Ketua Kelompok berhasil Masuk!']);
                            break;
                    }
                    # code...
                    break;
            }
            return redirect('/');
        }
    
        return redirect()->back()
            ->withInput()
            ->withErrors([
                'idOrEmail' => 'ID / Alamat Surel tidak terdaftar.',
                'password' => 'Kata Sandi salah.',
            ]);
    } 

    public function keluar() {
        Auth::logout();
        return redirect('/')->with(['success' => 'Berhasil Keluar!']);
    }
    
}
