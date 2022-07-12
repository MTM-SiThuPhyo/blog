<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = auth()->user();
        return view('auth.profile', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProfileRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        $user = auth()->user();
        Storage::delete($user->path);
        $filename = time() . '_' . $request->image->getClientOriginalName();
        $dir = '/upload/images';
        $path = $request->image->storeAs($dir, $filename);
        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'path'      => $path
        ]);
        return redirect('/profile')->with('success', 'A post was updated successfully.');
    }
}
