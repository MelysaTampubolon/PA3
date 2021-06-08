<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
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
        $getProdId = DB::table('product')->get();
        $getSumberDataId = DB::table('riwayat_fetch_data')->get();
        $getTokoId = DB::table('toko_online')->get();
        return view('transaksi.addTransaksi', compact('getProdId', 'getSumberDataId', 'getTokoId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_transaksi'=> 'required',
            'harga'=> 'required',
            'jumlah_produk'=> 'required',
            'id_produk'=> 'required',
            'id_sumberData'=> 'required',
            'id_toko'=> 'required',
            'status'=> 'required',
        ]);

        $query = DB::table('transaksi')->insert([
            'tanggal_transaksi'=>$request->input('tanggal_transaksi'),
            'product_id'=>$request->input('id_produk'),
            'harga'=>$request->input('harga'),
            'jumlah_produk'=>$request->input('jumlah_produk'),
            'toko_id'=>$request->input('id_toko'),
            'riwayat_id'=>$request->input('id_sumberData'),
            'status'=>$request->input('status'),
        ]);

        if ($query){
            return redirect('/showTransaksi')->with('success', 'Data Disimpan');
        }
        else{
            return redirect('/addTransaksi')->with('error', 'Data yang ada masukkan salah.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataTransaksi = DB::table('transaksi')->find($id);
        $otherData = DB::table('transaksi')->where('transaksi.id', '=', $id)
            ->join('product', 'transaksi.product_id', '=', 'product.id')
            ->join('toko_online', 'transaksi.toko_id', '=', 'toko_online.id')
            ->join('riwayat_fetch_data', 'transaksi.riwayat_id', '=', 'riwayat_fetch_data.id')
            ->select('product.nama_produk', 'toko_online.nama_toko', 'riwayat_fetch_data.deskripsi')
            ->first();
        return view('transaksi.detailTransaksi', compact('dataTransaksi', 'otherData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = DB::table('transaksi')->where('id', $id)->first();
        $other = DB::table('transaksi')->where('transaksi.id', '=', $id)
            ->join('product', 'transaksi.product_id', '=', 'product.id')
            ->join('toko_online', 'transaksi.toko_id', '=', 'toko_online.id')
            ->join('riwayat_fetch_data', 'transaksi.riwayat_id', '=', 'riwayat_fetch_data.id')
            ->select('product.nama_produk', 'toko_online.nama_toko', 'riwayat_fetch_data.deskripsi')
            ->first();
        $dataProd = DB::table('product')->get();
        $dataToko = DB::table('toko_online')->get();
        $dataRiwayat = DB::table('riwayat_fetch_data')->get();
        $otherData = [
            'otherData'=>$other
        ];
        $dataTransaksi = [
            'dataTransaksi'=>$row
        ];

        return view('transaksi.editTransaksi', compact('dataProd', 'dataToko', 'dataRiwayat'), $dataTransaksi, $otherData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
//            'tanggal_transaksi'=> 'required',
            'harga'=> 'required',
            'jumlah_produk'=> 'required',
            'nama_produk'=> 'required',
            'riwayat_id'=> 'required',
            'toko_id'=> 'required',
            'status'=> 'required',
        ]);

        $query = DB::table('transaksi')->where('id', $request->input('dataID'))
            ->update([
//                'tanggal_transaksi'=>$request->input('tanggal_transaksi'),
                'product_id'=>$request->input('nama_produk'),
                'harga'=>$request->input('harga'),
                'jumlah_produk'=>$request->input('jumlah_produk'),
                'toko_id'=>$request->input('toko_id'),
                'riwayat_id'=>$request->input('riwayat_id'),
                'status'=>$request->input('status'),
            ]);
        return redirect('/showTransaksi')->with('success', 'Data Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('transaksi')->where('id', $id)->delete();
        return redirect('/showTransaksi')->with('success', 'Data Dihapus');
    }
}
