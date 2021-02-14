<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function updateIcon(Request $request)
    {   
        $request -> validate([
            'icon' => 'file'
        ]);

        $data = $request -> all();
        $img = $request -> file('icon');
        $extension = $img -> getClientOriginalExtension();
        $name = rand(100000, 999999) . '_' . time();
        $finalFile = $name . '.' . $extension;
        $file = $img -> storeAs('icon', $finalFile, 'public');
        $user = Auth::user();
        $user -> icon = $finalFile;
        $user -> save();
        return redirect() -> back();

        // dd($data, $img);
    }

    public function clearIcon() {
        $user = Auth::user();
        $user -> icon = null;
        $user -> save();
        return redirect() -> back();
    }
}
