<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class AuthController extends Controller
{
  use AuthenticatesUsers;

  public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
  }

  public function login(Request $request)
  {
   if(auth()->guard('admin')->attempt([
    'username' => $request->username,
    'password' => $request->password
  ])) {
    return redirect()->route('admin.dashboard')->with('sukses', 'Selamat Datang Admin Di Aplikasi Coffee Shop');
  }
  elseif (auth()->guard('kurir')->attempt([
    'username' => $request->username,
    'password' => $request->password
  ])) {
    return redirect()->route('kurir.dashboard')->with('sukses', 'Selamat Datang Kurir Di Aplikasi Coffee Shop');
  }
  elseif (auth()->guard('customer')->attempt([
    'username' => $request->username,
    'password' => $request->password
  ])) {
    return redirect()->route('customer.index')->with('sukses', 'Selamat Datang Customer Di Aplikasi Coffee Shop');
  }
  else{
    return redirect()->route('guest.index')->with('gagal', 'Username atau Password Salah!');
  }
}

public function logout()
{
 auth()->guard('admin')->logout();
 auth()->guard('kurir')->logout();
 auth()->guard('customer')->logout();
 return redirect()->route('guest.index');
}
}
