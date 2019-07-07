<?php

namespace Icweb\Trusty\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Icweb\Trusty\App\Http\Requests\CreatesPermissionsRequest;
use Icweb\Trusty\App\Http\Requests\DeletesPermissionsRequest;
use Icweb\Trusty\App\Http\Requests\EditsPermissionsRequest;
use App\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trusty::permissions.index', ['permissions' => Permission::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trusty::permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatesPermissionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatesPermissionsRequest $request)
    {
        $permission = new Permission();
        $permission->name = preg_replace('/[^a-zA-Z0-9]/', '', $request->input('name'));
        $permission->display_name = $request->input('display_name');
        $permission->description = $request->input('description');
        $permission->save();

        return redirect()->route('trusty.permissions.show', $permission);
    }

    /**
     * Display the specified resource.
     *
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return view('trusty::permissions.show', [
            'permission' => $permission
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('trusty::permissions.edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditsPermissionsRequest  $request
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(EditsPermissionsRequest $request, Permission $permission)
    {
        $permission->name = preg_replace('/[^a-zA-Z0-9]/', '', $request->input('name'));
        $permission->display_name = $request->input('display_name');
        $permission->description = $request->input('description');
        $permission->save();

        return redirect()->route('trusty.permissions.show', $permission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletesPermissionsRequest $request
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeletesPermissionsRequest $request, Permission $permission)
    {
        $permission->delete();

        return redirect()->route('trusty.permissions.index');
    }
}
