<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Produk;
use Illuminate\Http\Request;
use Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        return view('customer.index',compact(['produk']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerCust(Request $request)
    {
        $check = Customer::where('username',$request->username)->count();
        if ($check < 1) {
            $customer = Customer::create([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_telp' => $request->no_telp,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);
            return redirect()->back()->with('sukses', 'Sukses Mendaftar, Silahkan Login!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal Mendaftar, Silahkan Gunakan Username Lain!');
        }
    }

    public function updateProfile(Request $request,$id)
    {
        if ($request->passwordlama == "" || $request->passwordbaru == "") {
            $customer = Customer::where('id',$id)->update([
                'username' => $request->username,
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
            ]);
            return back()->with('sukses', 'Berhasil update profile!');
        } elseif ($request->passwordlama && $request->passwordbaru) {
            $check = Customer::where('id',$id)->first();
            if (Hash::check($request->passwordlama, $check->password)) {
                $customer = Customer::where('id',$id)->update([
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
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
