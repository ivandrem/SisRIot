<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;

class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('is.visible.user')->except(['index','create','store']);
        
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.create')->only(['create','store']);
        $this->middleware('can:users.show')->only('show');
        $this->middleware('can:users.edit')->only(['edit','update']);
        $this->middleware('can:users.destroy')->only('destroy');
        $this->middleware('can:users.editState')->only(['editState','updateState']);
        $this->middleware('can:users.assignRole')->only(['users.assignRole','updateAssignedRole']);
        $this->middleware('can:users.resetPassword')->only('resetPassword');
    }

    public function index(Request $request)
    {
        $users = User::paginate(15);;

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $user = new User;
        $user->fill($request->only('dni', 'name', 'email', 'phone'));
        $user->password = Hash::make($request->get('dni'));

        $user->save();

        session()->flash('message', '¡Usuario registrado con éxito!');
        return redirect()->route('users.index', compact('user'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->fill($request->only('name', 'email', 'phone'));
        $user->save();

        session()->flash('message', '¡Usuario actualizado con éxito!');
        return redirect()->route('users.index', compact('user'));
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();
        session()->flash('message', '¡Usuario eliminado con éxito!');
        return redirect()->route('users.index');
    }

    public function editState(User $user)
    {
        return view('users.edit-state', compact('user'));
    }

    public function updateState(Request $request, User $user)
    {
        if($request->get('state')){$user->enabled = true;}
        else{$user->enabled = false;}

        $user->save();

        session()->flash('message', '¡Estado actualizado con éxito!');
        return redirect()->route('users.index', compact('user'));
    }

    public function assignRole(User $user)
    {
        $roles = Role::all();
        return view('users.assign-role', compact('user','roles'));
    }

    public function updateAssignedRole(Request $request, User $user)
    {
        if($request->get('role')){$user->syncRoles($request->get('role'));}
        else{$user->syncRoles([]);}

        session()->flash('message', '¡Rol asignado con éxito!');
        return redirect()->route('users.index', compact('user'));
    }

    public function resetPassword(Request $request, User $user)
    {
        $user->password = Hash::make($user->dni);
        $user->save();

        session()->flash('message', '¡Contraseña restablecida con éxito!');
        return redirect()->route('users.index', compact('user'));
    }

    public function report($report){
        switch ($report) {
            case 'users_report':
                $pdf = PDF::loadView('users.reports.users_report');
                    return $pdf->stream('reporte_usuarios.pdf');
                break;
            
            default:
                # code...
                break;
        }
    }

}