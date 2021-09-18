<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class HrdController extends Controller
{
    /**
     * Untuk menampilkan view dashboard
     */

    public function index()
    {
        return view('hrd.dashboard');
    }

    /**
     * Untuk menampilkan view user
     */

    public function user()
    {
        $data = User::where('role', 3)->get();

        return view('hrd.user', compact('data'));
    }

    /**
     * Untuk insert data user
     * @param $request
     */

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50|regex:/^[a-zA-Z ]+$/',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        User::insert([
            'id_user' => Uuid::uuid4()->getHex(),
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 3,
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        return back();
    }

    /**
     * Untuk update status user
     * @param $request
     */

    public function userStatus(Request $request)
    {
        $data = User::findOrFail($request->id);
        if($data->status == 1){
            $data->status = 0;
        }
        else{
            $data->status = 1;
        }
        $data->updated_at = Carbon::now();
        $data->save();

        return response()->json(["success" => true, "data" => $data]);
    }
}
