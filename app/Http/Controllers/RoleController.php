<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.editable.role')->except(['index','create','store']);
        
        $this->middleware('can:roles.index')->only('index');
        $this->middleware('can:roles.create')->only(['create','store']);
        $this->middleware('can:roles.show')->only('show');
        $this->middleware('can:roles.edit')->only(['edit','update','editPermissions','updatePermissions']);
        $this->middleware('can:roles.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
        $roles = Role::paginate(15);

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(RoleRequest $request)
    {
        $role = new Role;
        $role->fill($request->only('name', 'slug', 'description'));

        if(in_array($request->get('special'), ['all-access','no-access']))
        {
            $role->special = $request->get('special');
            $redirect_to = 'roles.index';
        }
        else{$role->special = null; $redirect_to = 'roles.editPermissions';}
        
        $role->save();

        session()->flash('message', '¡Rol registrado con éxito!');
        return redirect()->route($redirect_to, compact('role'));
    }

    public function show(Role $role)
    {
        return view('roles.show')->with(['role'=>$role]);
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all(); 
        return view('roles.edit', compact('role','permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $role->fill($request->only('name', 'slug', 'description'));

        return $this->updatePermissions($request, $role); //Continúa con el método updatePermissions
    }

    public function destroy(Request $request, Role $role)
    {
        $role->delete();
        session()->flash('message', '¡Rol eliminado con éxito!');
        return redirect()->route('roles.index');
    }

    public function editPermissions(Role $role)
    {
        $permissions = Permission::all(); 
        return view('roles.permissions', compact('role','permissions'));
    }

    public function updatePermissions(Request $request, Role $role)
    {
        if(in_array($request->get('special'), ['all-access','no-access']))
        {
            $role->special = $request->get('special');
        }
        else{
            if($request->get('permissions'))
            {
                $role->syncPermissions($request->get('permissions'));
                $role->special = null;
            }
            else{
                $role->syncPermissions([]);
                $role->special = 'no-access';
            }
        }
        
        $role->save();

        session()->flash('message', '¡Rol actualizado con éxito!');
        return redirect()->route('roles.index', compact('role'));
    }
}
