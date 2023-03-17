<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    function login()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        request()->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->level == 'admin') {
                return redirect()->intended('dashboard');
            }
            return redirect()->intended('login')->with('message', 'Data baru berhasil di tambahkan');
        }
        return back()->with('error', 'Username dan password anda salah!');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('login/simpeg');
    }

    function regis()
    {
        return view('registrasi');
    }


    public function regis_proses(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'username' => 'required',
            'password' => 'required|min:6',
            'confirm_password'  => 'required|same:password',

        ]);
        $dataArray = array(
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' => 'admin',
        );
        $user = User::create($dataArray);
        if (!is_null($user)) {
            return redirect()->route('login');
        }
        return back()->with('error', 'Gagal registrasi!, Masukan data dengan benar');
    }
}
