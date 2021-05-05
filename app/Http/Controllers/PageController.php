<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TokoOnline;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLogin()
    {
        return view('login');
    }

    public function index()
    {
        $soldAmnt = DB::table('transaksi')->where('status', '=', 'done')->sum('jumlah_produk');
        $transactionAmnt = DB::table('transaksi')->get()->count();
        $productAmnt = DB::table('product')->get()->count();
        $supplierAmnt = DB::table('supplier')->get()->count();
        $dataTransaksi = DB::table('transaksi')->get();
        $dataSupplier = DB::table('supplier')->get();
        return view('dashboard', compact('soldAmnt','transactionAmnt', 'productAmnt', 'supplierAmnt', 'dataTransaksi', 'dataSupplier'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSumberData()
    {
//        $sumberData = DB::table('riwayat_fetch_data')->get();
        $sumberData = DB::table('riwayat_fetch_data')
            ->join('supplier', 'riwayat_fetch_data.supplier_id', '=', 'supplier.id')
            ->join('file_config', 'riwayat_fetch_data.config_id', '=', 'file_config.id')
            ->select('riwayat_fetch_data.id', 'riwayat_fetch_data.tanggal_fetch', 'supplier.nama_toko', 'file_config.nama_file')
            ->get();

        return view('sumberData.sumberData', compact('sumberData'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailSumberData()
    {
        return view('sumberData.detailSumberData');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProduk()
    {
        $dataProduk = DB::table('product')->get();
        return view('produk.produk', compact('dataProduk'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTransaksi()
    {
        $dataTransaksi = DB::table('transaksi')
            ->join('toko_online', 'transaksi.toko_id', '=', 'toko_online.id')
            ->select('transaksi.id', 'transaksi.product_id', 'transaksi.tanggal_transaksi', 'transaksi.harga', 'transaksi.status' ,'toko_online.nama_toko')
            ->get();
        return view('transaksi.transaksi', compact('dataTransaksi'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showConfig()
    {
        $dataConfig = DB::table('file_config')->get();
        return view('fileConfig.showConfig', compact('dataConfig'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSupplier()
    {
        $dataSupplier = DB::table('supplier')->get();
        return view('supplier.supplier', compact('dataSupplier'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showShop()
    {
        $dataToko = DB::table('toko_online')->get();
        return view('onlineShop.toko', compact('dataToko'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAkun()
    {
        $dataAkun = DB::table('user')->get();
        return view('akun.akun', compact('dataAkun'));
    }
}
