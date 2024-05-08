<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        //
        $roles = Role::all();
        $i = 0;
        return view('roles.index', compact('roles', 'i'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        //
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        //$this->validate($request,[
       //    'permissions' => 'required'
        //]);
        $permissions = Permission::whereIn('id', $request->permission)->get();
        $role = Role::Create(['name' => $request->name]);
        $role-> syncPermissions($permissions);
        return back()->with('success','Role created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermission = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('roles.edit',compact('role','permissions','rolePermission'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //


        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        $permissions = Permission::whereIn('id', $request->permission)->get();

        $role->syncPermissions($permissions);

        return back()->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role) : RedirectResponse
    {
        //
        $role->delete();
        return back()->with('success','Role deleted successfully');
    }
}
