<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.show');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'confirm-new-password' => 'required|string|min:8'
        ]);

        $user = auth()->user();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');

        $user->save();

        session()->flash('message', '¡Perfil actualizado con éxito!');
        return redirect()->route('profile.show');
    }

    public function editPassword()
    {
        return view('profile.edit-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8',
            'new-password' => 'required|string|min:8',
            'confirm-new-password' => 'required|string|min:8'
        ]);

        if($request->get('new-password') == $request->get('confirm-new-password'))
        {
            $user = auth()->user();

            if(Hash::check($request->get('password'), $user->password))
            {
                $user->password = Hash::make($request->get('new-password'));
                $user->save();

                session()->flash('message', '¡Contraseña actualizada con éxito!');
                return redirect()->route('profile.show');
            }
            else{session()->flash('error_message', '¡Contraseña actual incorrecta!');}  
        }
        else{session()->flash('error_message', '¡Confirmación de nueva contraseña incorrecta!');} 
        
        return redirect()->route('profile.editPassword');
    }
}
