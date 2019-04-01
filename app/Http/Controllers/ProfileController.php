<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.profile')->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param  \App\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|string|',
            'email'    => 'required|string|email|exists:users',
            'password' => 'nullable|string|min:6|confirmed',
            'bio'      => 'nullable|max:300',
            'facebook' => 'nullable|url',
            'youtube'  => 'nullable|url',
            'avatar'   => 'nullable|image',
        ]);

        if ($request->hasFile('avatar')){
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $fileNameToUpload = $fileName.'_'.time().'.'.$extension;
            //store the avatar image
            $request->file('avatar')->storeAs('public/uploads/avatars',$fileNameToUpload);
            if (Auth::user()->profile['avatar'] != 'default-avatar.png'){
                Storage::delete('/public/uploads/avatars/'.\Auth::user()->profile['avatar']);
            }
        }else{
            $fileNameToUpload = Auth::user()->profile['avatar'];
        }

        //check password
        if ($request['password'] != null){
            $password = bcrypt($request['password']);
        }else{
            $password = \Auth::user()->password;
        }

        Auth::user()->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $password,
        ]);

        \Auth::user()->profile->update([
            'avatar' => $fileNameToUpload,
            'facebook' => $request['facebook'],
            'youtube' => $request['youtube'],
            'bio' => $request['bio'],
        ]);

        return redirect()->back()->with('success','Profile updated.');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
