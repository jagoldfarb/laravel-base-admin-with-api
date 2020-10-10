<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class PasswordController extends Controller
{
    private $resource = 'passwords';

    public function index()
    {
        return view('passwords/form');
    }

    public function validateInputs($request)
    {
        $request->validate([
            'current_password' => 'required|min:8',
            'password' => 'required|min:8|confirmed|different:current_password'
        ]);
    }

    public function store(Request $request)
    {
        $this->validateInputs($request);
        
        $user = Auth::user();
        if(!Hash::check($request['current_password'], $user->password))
            return redirect($this->resource)->with('error', 'Contraseña actual incorrecta')->withInput();
        
        $user->password = Hash::make($request['password']);
        $user->save();
        return redirect('users')->with('success', 'Contraseña actualizada con éxito');
    }
}
