<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|max:255'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);
        
        return redirect('/loginbuku')->with('success', 'Regristrasi Berhasil! Silahkan Login');
    }
}
