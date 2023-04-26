<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    protected $username = 'nim';


    public function IndexLogin()
    {
        if (session()->has('getNim')) {
            return redirect('/indexKrs');
        }
        return view('Login.login');
    }

    public function actionLoginMahasiswa(Request $request)
    {
        $checkingInput = $request->validate([
            'nim' => 'required',
            'pin' => 'required',
        ]);

        $ambilNIM = $checkingInput['nim'];
        $ambilPIN = $checkingInput['pin'];

        //QUERY SELECT WHERE MYSL
        $checkingMahasiswa =  DB::table('mhs')->where('nim', $ambilNIM)->where('pin', $ambilPIN)->where('status', 'AKTIF')->get();
        $ambilCount = $checkingMahasiswa->count();

        // $checkingKrs = DB::table('krs')->where('nim', $ambilNIM)->get();

        if ($ambilCount == 1) {
            $request->session()->put('getNim', $checkingInput['nim']);
            return redirect('/indexKrs');
        } else {
            return back()->with('loginError', 'Login failed!');
        }
    }
}
