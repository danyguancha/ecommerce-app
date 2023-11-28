<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Role;
use App\Mail\sendNewUser;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::all();
        $roles = Role::all();
        $permisos = $request->user()->getAllPermissions();
        return view('users.index', compact('users', 'roles', 'permisos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'type_document' => ['required', 'string', 'max:255'],
            'number_document' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'role' => ['required'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);

        if ($validator->fails()) {
            return redirect('/users')->withErrors($validator)->withInput();
        }
        $user = User::create([
            'name' => $input['name'],
            'type_document' => $input['type_document'],
            'number_document' => $input['number_document'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            //'role' => $input['role'],
        ]);
        Mail::to($user->email)->send(new sendNewUser($user));

        return redirect('/users');
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
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function assign_rol(User $user)
    {
        $roles = Role::all();
        return view('users.userRol',
        ['user' => $user
        ,'roles' => $roles]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return redirect('/users');
    }

    public function update_rol(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('users.edit', $user);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
