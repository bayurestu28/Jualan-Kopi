<?php

namespace App\Http\Controllers;

use App\DetilTransaksi;
use Illuminate\Http\Request;

class DetilTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\DetilTransaksi  $detilTransaksi
     * @return \Illuminate\Http\Response
     */
    public function show(DetilTransaksi $detilTransaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetilTransaksi  $detilTransaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(DetilTransaksi $detilTransaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetilTransaksi  $detilTransaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetilTransaksi $detilTransaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetilTransaksi  $detilTransaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detilTransaksi = DetilTransaksi::where('id_detil',$id)->delete();
        return redirect()->back()->with('sukses','Barang dihapus');
    }

    public function tambahJumlah(Request $request, $id)
    {
        $detilTransaksi = DetilTransaksi::where('id_detil',$id)->update([
            'jumlah' => $request->jumlah,
        ]);
        return redirect()->back();
    }
}
