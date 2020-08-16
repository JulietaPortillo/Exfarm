<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get()->where('status', User::ACTIVE);

        return view('users.index')
                ->with('users', $users)
                ->with('title', 'Mantenimiento Usuarios');
    }

    public function login($email, $password)
    {
        $user = User::get()
                ->where('email', $email)
                ->where('password', $password);
        
        if ($user) {
            return view('purchases.index');
        } else {
            return view('/')
                    ->with('message', 'Usuario no autenticado');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get()->where('status', Role::ACTIVE);

        return view('users.create')
                ->with('roles', $roles)
                ->with('title', 'Crear Usuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role_id = $request->input('role');

        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get()->where('status', Role::ACTIVE);

        return view('users.edit')
                ->with('user', $user)
                ->with('roles', $roles)
                ->with('title', 'Actualizar Usuario');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role_id = $request->input('role');

        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Update State Resource - DELETE
     */
    public function updateState($id)
    {

        $user = User::find($id);

        $user->status = User::INACTIVE;

        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
