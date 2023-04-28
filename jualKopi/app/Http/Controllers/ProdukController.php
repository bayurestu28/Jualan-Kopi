<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        return view('admin.produk',compact(['produk']));
    }

    public function guestIndex()
    {
        $produk = Produk::all();
        return view('index',compact(['produk']));
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
        $role = [
            'nama_produk'  => 'required',
            'stok'  => 'required',
            'harga' => 'required',
            'gambar' => 'required',
        ];
        
        $this->validate($request, $role, $this->validateMessage());

        $gambar = $request->file('gambar');
        $nama_file = time().'_GambarProduk.'.$gambar->getClientOriginalExtension();
        $folder_tujuan = "img/produk";

        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'gambar' => $nama_file,
        ]);
        if ($produk) {
            $gambar->move($folder_tujuan,$nama_file);
            return back()->with('sukses', 'Produk berhasil ditambahkan!');
        } else {
            return back()->with('gagal', 'Produk gagal ditambahkan!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::where('id_produk',$id)->first();
        return view('admin.produk.editform',compact(['produk']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = [
            'nama_produk'  => 'required',
            'stok'  => 'required',
            'harga' => 'required',
        ];
        
        $this->validate($request, $role, $this->validateMessage());

        $produk = Produk::where('id_produk',$id)->update([
            'nama_produk' => $request->nama_produk,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        if ($produk) {
            if ($request->file('gambar') == null) {
                return redirect()->route('admin.produk')->with('sukses', 'Produk berhasil diubah!');
            } else {
                $gambar = $request->file('gambar');
                $nama_file = time().'_GambarProduk.'.$gambar->getClientOriginalExtension();
                $folder_tujuan = "img/produk";

                $getgambar = Produk::where('id_produk',$id)->first();

                if(\File::exists(public_path('img/produk/'.$getgambar->gambar))){
                    \File::delete(public_path('img/produk/'.$getgambar->gambar));
                }

                $produk = Produk::where('id_produk',$id)->update([
                    'gambar' => $nama_file,
                ]);
                
                $gambar->move($folder_tujuan,$nama_file);
                return redirect()->route('admin.produk')->with('sukses', 'Produk berhasil diubah!');
            }
            
        } else {
            return back()->with('gagal', 'Produk gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::where('id_produk',$id)->first();
        if ($produk) {
            $produkdel = Produk::where('id_produk',$id)->delete();
            if(\File::exists(public_path('img/produk/'.$produk->gambar))){
                \File::delete(public_path('img/produk/'.$produk->gambar));
            }
            return back()->with('sukses', 'Produk berhasil dihapus!');
        } else {
            return back()->with('gagal', 'Produk gagal dihapus!');
        }
    }

    public function detailProduk($id)
    {
        $produk = Produk::where('id_produk',$id)->first();
        return view('customer.produk.detail',compact(['produk']));
    }

    public function validateMessage()
    {
        return [
            'nama_produk.required'  => 'Nama Produk belum diisi!',
            'stok.required'  => 'Stok belum diisi!',
            'harga.required' => 'Harga belum diisi!',
            'gambar.required' => 'Gambar belum dipilih!',
        ];
    }
}
