<?php

namespace App\Http\Controllers;

use App\Kurir;
use Illuminate\Http\Request;
use Hash;

class KurirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kurir.dashboard');
    }

    public function indexKurir()
    {
        $kurir = Kurir::all();
        return view('admin.kurir',compact(['kurir']));
    }

    public function updateProfile(Request $request,$id)
    {
        if ($request->passwordlama == "" || $request->passwordbaru == "") {
            $kurir = Kurir::where('id',$id)->update([
                'username' => $request->username,
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
            ]);
            return back()->with('sukses', 'Berhasil update profile!');
        } elseif ($request->passwordlama && $request->passwordbaru) {
            $check = Kurir::where('id',$id)->first();
            if (Hash::check($request->passwordlama, $check->password)) {
                $admin = Kurir::where('id',$id)->update([
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = [
            'username'  => 'required',
            'password'  => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir'  => 'required',
            'password'  => 'required',
            'no_telp' => 'required',
            'jenis_kelamin' => 'required',
        ];
        
        $this->validate($request, $role, $this->validateMessage());

        $check = Kurir::where('username',$request->username)->count();
        if ($check < 1) {
            $kurir = Kurir::create([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_telp' => $request->no_telp,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);
            return redirect()->back()->with('sukses', 'Berhasil menambah kurir!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menambah kurir!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function show(Kurir $kurir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $kurir = Kurir::where('id',$id)->first();
     return view('admin.kurir.editform',compact(['kurir']));
 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = [
            'username'  => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir'  => 'required',
            'no_telp' => 'required',
            'jenis_kelamin' => 'required',
        ];
        
        $this->validate($request, $role, $this->validateMessage());

        if ($request->password == null) {
            $kurir = Kurir::where('id',$id)->update([
                'username' => $request->username,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_telp' => $request->no_telp,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);
        } else {
            $kurir = Kurir::where('id',$id)->update([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_telp' => $request->no_telp,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);
        }

        if ($kurir) {
            return redirect()->route('admin.kurir')->with('sukses', 'Berhasil mengubah data kurir!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal mengubah data kurir!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = Kurir::where('id',$id)->count();
        if ($check == 1) {
            $kurir = Kurir::where('id',$id)->delete();
            return redirect()->back()->with('sukses', 'Berhasil menghapus data kurir!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus data kurir!');
        }
    }

    public function validateMessage()
    {
        return [
            'username.required'  => 'Username belum diisi!',
            'password.required'  => 'Password belum diisi!',
            'nama.required' => 'Nama belum diisi!',
            'alamat.required' => 'alamat belum dipilih!',
            'tanggal_lahir.required'  => 'tanggal lahir belum diisi!',
            'password.required'  => 'Password belum diisi!',
            'no_telp.required' => 'no telp harus berjumlah 12',
            'jenis_kelamin.required' => 'jenis_kelamin belum di isi',
        ];
    }
}
