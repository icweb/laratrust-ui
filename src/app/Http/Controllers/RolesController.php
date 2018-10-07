<?php

namespace Icweb\Trusty\App\Http\Controllers;

Use App\Http\Controllers\Controller;
use Icweb\Trusty\App\Http\Requests\CreatesRolesRequest;
use Icweb\Trusty\App\Http\Requests\DeletesRolesRequest;
use Icweb\Trusty\App\Http\Requests\EditsRolesRequest;
use App\Permission;
use App\Role;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trusty::roles.index', [
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trusty::roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatesRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatesRolesRequest $request)
    {
        $role = new Role();
        $role->name = preg_replace('/[^a-zA-Z0-9]/', '', $request->input('name'));
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        return redirect()->route('roles.show', $role);
    }

    /**
     * Display the specified resource.
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permission_ids = DB::table('permission_role')->select('permission_id')->where(['role_id' => $role->id])->get()->pluck('permission_id')->toArray();
        $permissions = Permission::all();

        return view('trusty::roles.show', [
            'role'              => $role,
            'permissions'       => $permissions,
            'permission_ids'    => $permission_ids,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permission_ids = DB::table('permission_role')->select('permission_id')->where(['role_id' => $role->id])->get()->pluck('permission_id')->toArray();
        $permissions = Permission::all();

        return view('trusty::roles.edit', [
            'role'              => $role,
            'permissions'       => $permissions,
            'permission_ids'    => $permission_ids,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditsRolesRequest  $request
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(EditsRolesRequest $request, Role $role)
    {
        $role->name = preg_replace('/[^a-zA-Z0-9]/', '', $request->input('name'));
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        DB::table('permission_role')->where(['role_id' => $role->id])->delete();

        foreach($request->all() as $key => $val)
        {
            if(substr($key, 0, 11) === 'permission_')
            {
                $permission = substr($key, 11);
                $permissionRecord = Permission::where(['name' => $permission])->get();

                if(count($permissionRecord))
                {
                    if($val) $role->attachPermission($permissionRecord[0]);
                }
            }
        }

        return redirect()->route('roles.show', $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletesRolesRequest $request
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeletesRolesRequest $request, Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index');
    }
}
