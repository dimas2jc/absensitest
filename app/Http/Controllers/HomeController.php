<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Untuk menampilkan view login
     */

    public function authenticate()
    {
        return view('login');
    }

    /**
     * Untuk authenticate
     * @param $request
     */

    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))){
            if(Auth::user()->role == 1){
                return redirect()->route('hrd');
            }
            elseif(Auth::user()->role == 2){
                return redirect()->route('manajer');    
            }
            elseif(Auth::user()->role == 3){
                return redirect()->route('karyawan');    
            }
        }      
        session()->flash('error', 'Invalid Username or Password');
        
        return redirect('/');
    }

    /**
     * Untuk logout
     */

    public function logout()
    {
        Auth::logout();

        return redirect ('/');
    }

    /**
     * Untuk menampilkan view profile user
     */

    public function profile()
    {
        $data = User::findOrFail(Auth::user()->id_user)->first();

        return view('profile', compact('data'));
    }

    /**
     * Untuk update data user
     * @param $request
     */

    public function updateProfile(Request $request)
    {
        $data = User::where('email', '=', Auth::user()->email)->first();
        $data->email = $request->email;
        $data->alamat = $request->alamat;
        $data->save();

        return back();
    }

    /**
     * Untuk menampilkan view ganti password
     */

    public function gantiPassword()
    {
        return view('change-password');
    }

    /**
     * Untuk input update password
     * @param $request
     */

    public function updatePassword(Request $request){
        $user = User::where('email', '=', Auth::user()->email)->first();
        $user->password = Hash::make($request->new_password);
        $user->updated_at = Carbon::now();
        $user->save();

        if(Auth::user()->role == 1){
            return redirect()->route('hrd');
        }
        elseif(Auth::user()->role == 2){
            return redirect()->route('manajer');
        }
        elseif(Auth::user()->role == 3){
            return redirect()->route('karyawan');
        }
    }
}
