<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\DetilTransaksi;
use App\Produk;
use App\Kurir;
use Illuminate\Http\Request;
use Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPesanan()
    {
        $transaksi = Transaksi::where(function ($query){
            $query->where('status_transaksi','!=','Uncheckout')
            ->where('status_transaksi','!=','Diterima');
        })
        ->get();
        return view('admin.pesanan',compact(['transaksi']));
    }

    public function indexPengiriman()
    {
        $transaksi = Transaksi::where(function ($query){
            $query->where('status_transaksi','=','Dikirim')
            ->where('id_kurir','=',Auth::user()->id);
        })
        ->get();
        return view('kurir.pengiriman',compact(['transaksi']));
    }

    public function detailPengiriman($id)
    {
        $transaksi = Transaksi::join('detil_transaksis','transaksis.id_transaksi','=','detil_transaksis.id_transaksi')
        ->join('produks','detil_transaksis.id_produk','=','produks.id_produk')
        ->where('transaksis.id_transaksi',$id)
        ->get();
        return view('kurir.pengiriman.detail',compact(['transaksi']));
    }

    public function detailPesanan($id)
    {
        $transaksi = Transaksi::join('detil_transaksis','transaksis.id_transaksi','=','detil_transaksis.id_transaksi')
        ->join('produks','detil_transaksis.id_produk','=','produks.id_produk')
        ->where('transaksis.id_transaksi',$id)
        ->get();
        return view('admin.pesanan.detail',compact(['transaksi']));
    }

    public function konfirmasiPesanan($id)
    {
        $produk = Produk::join('detil_transaksis','produks.id_produk','=','detil_transaksis.id_produk')
        ->where('detil_transaksis.id_transaksi',$id)
        ->get();
        $total = 0;
        foreach ($produk as $stok) {
            $updatestok = Produk::where('id_produk',$stok->id_produk)->update([
                'stok' => ($stok->stok - $stok->jumlah)
            ]);
            $total = $total + ($stok->jumlah * $stok->harga);
        }
        $transaksi = Transaksi::where('id_transaksi',$id)->update([
            'status_transaksi' => 'Lunas',
            'biaya' => $total+10000,
        ]);
        if ($transaksi) {
            return redirect()->back()->with('sukses','Berhasil Konfirmasi Pesanan!');
        } else {
            return redirect()->back()->with('gagal','Gagal Konfirmasi Pesanan!');
        }
    }

    public function pilihKurir($id)
    {
        $transaksi = Transaksi::join('detil_transaksis','transaksis.id_transaksi','=','detil_transaksis.id_transaksi')
        ->join('produks','detil_transaksis.id_produk','=','produks.id_produk')
        ->where('transaksis.id_transaksi',$id)
        ->get();
        $kurir = Kurir::all();
        return view('admin.pesanan.pilihkurir',compact(['transaksi','kurir']));
    }

    public function kurirDipilih($id,$idkurir)
    {
        $transaksi = Transaksi::where('id_transaksi',$id)->update([
            'status_transaksi' => 'Dikirim',
            'id_kurir' => $idkurir,
        ]);
        $kurir = Kurir::where('id',$idkurir)->update([
            'status_kurir' => 'On Work',
        ]);
        if ($transaksi && $kurir) {
            return redirect()->route('admin.transaksi.pesanan')->with('sukses','Berhasil Meneruskan ke Kurir!');
        } else {
            return redirect()->back()->with('gagal','Gagal Meneruskan ke Kurir!');
        }
    }

    public function konfirmasiPengiriman($id)
    {
        $transaksi = Transaksi::where('id_transaksi',$id)->update([
            'status_transaksi' => 'Diterima',
        ]);
        $kurir = Kurir::where('id',Auth::user()->id)->update([
            'status_kurir' => 'Ready',
        ]);
        if ($transaksi && $kurir) {
            return redirect()->route('kurir.pengiriman.dikirim')->with('sukses','Berhasil Konfirmasi Pengiriman!');
        } else {
            return redirect()->back()->with('gagal','Gagal Konfirmasi Pengiriman!');
        }
    }

    public function riwayatPengiriman()
    {
        $transaksi = Transaksi::join('customers','transaksis.id_customer','=','customers.id')
        ->join('kurirs','transaksis.id_kurir','=','kurirs.id')
        ->select('transaksis.id_transaksi','customers.username as usercustomer','kurirs.username as userkurir','transaksis.biaya','transaksis.waktu_transaksi','transaksis.pemesan','transaksis.nohp_pemesan','transaksis.alamat_pemesan','transaksis.jenis_pengiriman','transaksis.status_transaksi')
        ->where('transaksis.status_transaksi','=','Diterima')
        ->where('transaksis.id_kurir','=',Auth::user()->id)
        ->get();
        return view('kurir.pengiriman.riwayat',compact(['transaksi']));
    }

    public function riwayatPemesanan()
    {
        $transaksi = Transaksi::where('transaksis.status_transaksi','!=','Uncheckout')
        ->where('transaksis.id_customer','=',Auth::user()->id)
        ->get();
        return view('customer.riwayat',compact(['transaksi']));
    }

    public function laporanPenjualan()
    {
        $transaksi = Transaksi::join('customers','transaksis.id_customer','=','customers.id')
        ->join('kurirs','transaksis.id_kurir','=','kurirs.id')
        ->select('transaksis.id_transaksi','customers.username as usercustomer','kurirs.username as userkurir','transaksis.biaya','transaksis.waktu_transaksi','transaksis.pemesan','transaksis.nohp_pemesan','transaksis.alamat_pemesan','transaksis.jenis_pengiriman','transaksis.status_transaksi')
        ->where('transaksis.status_transaksi','!=','Uncheckout')
        ->get();
        return view('admin.laporan',compact(['transaksi']));
    }

    public function cart()
    {
        $transaksi = Transaksi::join('detil_transaksis','transaksis.id_transaksi','=','detil_transaksis.id_transaksi')
        ->join('produks','detil_transaksis.id_produk','=','produks.id_produk')
        ->where('transaksis.id_customer',Auth::user()->id)
        ->where('transaksis.status_transaksi','Uncheckout')
        ->get();
        return view('customer.keranjang',compact(['transaksi']));
    }

    public function addtoCart($id)
    {
        $check = Transaksi::where('id_customer',Auth::user()->id)
        ->where('status_transaksi','Uncheckout')->count();
        if ($check == 0) {
            $transaksi = Transaksi::create([
                'id_customer' => Auth::user()->id,
                'status_transaksi' => 'Uncheckout',
            ]);

            $getid = Transaksi::where('id_customer',Auth::user()->id)
            ->where('status_transaksi','Uncheckout')->first();

            $detil_transaksis = DetilTransaksi::create([
                'id_transaksi' => $getid->id_transaksi,
                'id_produk' => $id,
                'jumlah' => 1,
            ]);

            return redirect()->route('customer.cart');

        } else {
            $transaksi = Transaksi::where('id_customer',Auth::user()->id)
            ->where('status_transaksi','Uncheckout')->first();

            $checkdetil = DetilTransaksi::where('id_transaksi',$transaksi->id_transaksi)
            ->where('id_produk',$id)->count();
            if ($checkdetil < 1) {
                $detil_transaksis = DetilTransaksi::create([
                    'id_transaksi' => $transaksi->id_transaksi,
                    'id_produk' => $id,
                    'jumlah' => 1,
                ]);
                return redirect()->route('customer.cart');
            } else {
                return redirect()->route('customer.cart')->with('gagal','Barang sudah ada di keranjang');
            }
        }
    }

    public function checkout($id)
    {
        $transaksi = Transaksi::join('detil_transaksis','transaksis.id_transaksi','=','detil_transaksis.id_transaksi')
        ->join('produks','detil_transaksis.id_produk','=','produks.id_produk')
        ->where('transaksis.id_customer',Auth::user()->id)
        ->where('transaksis.status_transaksi','Uncheckout')
        ->get();
        return view('customer.checkout',compact(['transaksi']));
    }

    public function checkoutConfirm(Request $request,$id)
    {
        $role = [
            'pemesan'  => 'required',
            'nohp_pemesan'  => 'required',
            'alamat_pemesan' => 'required',
        ];
        
        $this->validate($request, $role, $this->validateMessage());

        $transaksi = Transaksi::where('id_transaksi',$id)->update([
            'pemesan' => $request->pemesan,
            'nohp_pemesan' => $request->nohp_pemesan,
            'alamat_pemesan' => $request->alamat_pemesan,
            'jenis_pengiriman' => $request->jenis_pengiriman,
            'waktu_transaksi' => date('Y-m-d H:i:s'),
            'biaya' => $request->biaya,
            'status_transaksi' => 'Checkout',
        ]);
        if (!$transaksi) {
            return redirect()->back()->with('gagal','Gagal melakukan checkout pesanan');
        } else {
            return redirect()->route('customer.cart')->with('sukses','Berhasil melakukan checkout pesanan');
        }
    }

    public function validateMessage()
    {
        return [
            'pemesan.required'  => 'Pemesan belum diisi!',
            'nohp_pemesan.required'  => 'No Telp belum diisi!',
            'alamat_pemesan.required' => 'Alamat belum diisi!',
        ];
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
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
