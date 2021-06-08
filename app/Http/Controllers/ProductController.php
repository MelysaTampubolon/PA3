<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = DB::table('product')->where('id', $id)->first();
        $dataProduk = [
            'dataProduk'=>$row
        ];

        return view('produk.editProductForm', $dataProduk);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama_produk'=> 'required',
            'url_produk'=> 'required',
            'harga'=> 'required',
            'stok'=> 'required',
            'url_gambar'=> 'required',
        ]);

        $query = DB::table('product')->where('id', $request->input('dataID'))
            ->update([
                'nama_produk'=>$request->input('nama_produk'),
                'url_produk'=>$request->input('url_produk'),
                'harga'=>$request->input('harga'),
                'stok'=>$request->input('stok'),
                'gambar'=>$request->input('url_gambar'),
            ]);
        return redirect('/showProduk')->with('success', 'Data Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('product')->where('id', $id)->delete();
        return redirect('/showProduk')->with('success', 'Data Dihapus');
    }
}
