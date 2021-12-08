<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
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
        $users = User::filter()->sort()->paginate(config('contants.pagination_limit'));
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home')],
            ['title' => 'Users', 'url' => route('users.index')],
        ];

        return view('users.index', [
            'users' => $users,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home')],
            ['title' => 'Users', 'url' => route('users.index')],
            ['title' => 'User Create', 'url' => route('users.create')],
        ];

        return view('users.create', [
            'user' => new User(),
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'A user was created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home')],
            ['title' => 'Users', 'url' => route('users.index')],
            ['title' => 'User Detail', 'url' => route('users.show', $user->id)],
        ];

        return view('users.show', [
            'user' => $user,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home')],
            ['title' => 'Users', 'url' => route('users.index')],
            ['title' => 'User Edit', 'url' => route('users.edit', $user->id)],
        ];

        return view('users.edit', [
            'user' => $user,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->only('name'));

        return redirect()->route('users.index')->with('success', 'A user was updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
