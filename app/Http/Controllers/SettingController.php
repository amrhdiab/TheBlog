<?php

namespace App\Http\Controllers;

use App\setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::first();
        return view('admin.settings.update')->with('settings',$settings);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'site_name' => 'required|string|max:15',
            'contact_number' => 'required|string',
            'contact_email' => 'required|email',
            'address' => 'required|string',
        ]);

        $setting = Setting::first();
        $setting->update([
            'site_name' => $request['site_name'],
            'contact_number' => $request['contact_number'],
            'contact_email' => $request['contact_email'],
            'address' => $request['address'],
        ]);

        return redirect()->back()->with('success','Site settings updated.');
    }
}
