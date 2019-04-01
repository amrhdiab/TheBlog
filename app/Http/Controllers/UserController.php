<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('owner',['only'=>'create']);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'       => 'required|string|',
            'email'      => 'required|string|email|unique:users',
            'password'   => 'required|string|min:6|confirmed',
            'permission' => 'required',
        ]);

        $user = User::create([
            'name'     => $request['name'],
            'email'    => $request['email'],
            'password' => bcrypt($request['password']),
            'admin'    => $request['permission']
        ]);

        Profile::create([
            'user_id' => $user['id'],
            'avatar'  => 'default-avatar.png',
        ]);

        return redirect(route('user.index'))->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User                $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user['owner'])
        {
            return redirect()->back()->with('info', 'You are not authorized.');
        } elseif($user['admin'] && ! \Auth::user()->owner)
        {
            return redirect()->back()->with('info', 'You are not authorized.');
        }
        $user->delete();
        $user->profile()->delete();

        foreach ($user->posts as $post){
        $post->forceDelete();
        }
        return redirect(route('user.index'))->with('success', 'User deleted successfully.');
    }

    public function adminPermission(User $user)
    {
        $user->update(['admin' => 1]);
        return back()->with('success', 'User permission changed.');
    }

    public function authorPermission(User $user)
    {
        $user->update(['admin' => 0]);
        return back()->with('success', 'User permission changed.');
    }


}
