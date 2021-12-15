<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email'));
        
        $profile = Profile::findOrFail($user->profile->id);
        if($request->hasFile('photo')){
            Storage::delete('/public/user-photos/'.$profile->photo);
            $photo = $request->file('photo'); 
            $photoName = $photo->getClientOriginalName();
            $path = $request->file('photo')->storeAs('public/user-photos',$photoName);
            $profile->photo = $photoName ;
        }

        $profile->user_id = $user->id;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->joined_at = $request->joined_at;
        $profile->resigned_at = $request->resigned_at;
        $profile->update();

        return redirect()->route('profile.index')->with('success', 'Your Profile was updated.');
    }
}
