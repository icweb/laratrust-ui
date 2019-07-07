<?php

namespace Icweb\Trusty\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Icweb\Trusty\App\Http\Requests\CreatesUsersRequest;
use Icweb\Trusty\App\Http\Requests\DeletesUsersRequest;
use Icweb\Trusty\App\Http\Requests\EditsUsersRequest;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trusty::users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trusty::users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatesUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatesUsersRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('trusty.users.show', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::all();
        $role_ids = DB::table('role_user')->select('role_id')->where(['user_id' => $user->id])->get()->pluck('role_id')->toArray();

        return view('trusty::users.show', [
            'user'      => $user,
            'roles'     => $roles,
            'role_ids'  => $role_ids
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $role_ids = DB::table('role_user')->select('role_id')->where(['user_id' => $user->id])->get()->pluck('role_id')->toArray();

        return view('trusty::users.edit', [
            'user'      => $user,
            'roles'     => $roles,
            'role_ids'  => $role_ids
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditsUsersRequest  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(EditsUsersRequest $request, User $user)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        DB::table('role_user')->where(['user_id' => $user->id])->delete();

        foreach($request->all() as $key => $val)
        {
            if(substr($key, 0, 5) === 'role_')
            {
                $role = substr($key, 5);
                $roleRecord = Role::where(['name' => $role])->get();

                if(count($roleRecord))
                {
                    if($val) $user->attachRole($roleRecord[0]);
                }
            }
        }

        return redirect()->route('trusty.users.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletesUsersRequest $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeletesUsersRequest $request, User $user)
    {
        $user->delete();

        return redirect()->route('trusty.users.index');
    }
}
