<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.dashboard');
    }

    public function updateProfile(Request $request,$id)
    {
        if ($request->passwordlama == "" || $request->passwordbaru == "") {
            $admin = Admin::where('id',$id)->update([
                'username' => $request->username,
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
            ]);
            return back()->with('sukses', 'Berhasil update profile!');
        } elseif ($request->passwordlama && $request->passwordbaru) {
            $check = Admin::where('id',$id)->first();
            if (Hash::check($request->passwordlama, $check->password)) {
                $admin = Admin::where('id',$id)->update([
                    'username' => $request->username,
                    'nama' => $request->nama,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'no_telp' => $request->no_telp,
                    'alamat' => $request->alamat,
                    'password' => bcrypt($request->passwordbaru),
                ]);
                return back()->with('sukses', 'Berhasil update profile!');
            } else {
                return back()->with('gagal', 'Gagal update profile, Password lama anda salah!');
            }
        } else {
            return back()->with('gagal', 'Gagal update profile!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
