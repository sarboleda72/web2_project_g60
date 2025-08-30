<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::All();
        return view('users.index')->with(['users'=> $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $user -> name = $request->name;
        $user -> lastname = $request->lastname;
        $user -> phone = $request->phone;
        $user -> address = $request->address;
        $user -> email = $request->email;
        $user -> password = bcrypt($request->password);

        if( $user -> save() ){
            return redirect('users')->with('messages', 'El usuario: '. $user -> name .'¡Fue creado!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return ['user' => $user];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(userRequest $request, User $user)
    {
        $user -> name = $request->nameEdit;
        $user -> lastname = $request->lastnameEdit;
        $user -> phone = $request->phoneEdit;
        $user -> address = $request->addressEdit;
        $user -> email = $request->emailEdit;

        if( $user -> save() ){
            return redirect('users')->with('messages', 'El usuario: '. $user -> name .'¡Fue actualizado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
