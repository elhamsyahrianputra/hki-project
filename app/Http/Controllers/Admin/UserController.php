<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.user.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.user.create', [

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();

        User::create($validatedData)->assignRole($validatedData['role']);

        return redirect()->route('admin.users.index')->with('createUser', 'User Baru Telah Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)

    {
        return view('dashboard.admin.user.show', [
            'user' => $user,
            'brands' => $user->brands,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, User $user)
    {
        $validatedData = $request->validated();

        User::find($user->id)->update($validatedData);
        return redirect()->route('admin.users.index')->with('updateProfile', 'Data Profil Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
