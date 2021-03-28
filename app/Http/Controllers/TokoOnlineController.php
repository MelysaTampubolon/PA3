<?php

namespace App\Http\Controllers;

use App\Models\TokoOnline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TokoOnlineController extends Controller
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
        return view('onlineShop.addTokoForm');
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
            'nama_toko'=> 'required',
            'nama_platform'=> 'required',
        ]);

        $query = DB::table('toko_online')->insert([
            'nama_toko'=>$request->input('nama_toko'),
            'nama_platform'=>$request->input('nama_platform'),
        ]);

        if ($query){
            return redirect('/showShop')->with('success', 'Data Disimpan');
        }
        else{
            return redirect('/addToko')->with('error', 'Data yang ada masukkan salah.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TokoOnline  $tokoOnline
     * @return \Illuminate\Http\Response
     */
    public function show(TokoOnline $tokoOnline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TokoOnline  $tokoOnline
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = DB::table('toko_online')->where('id', $id)->first();
        $dataToko = [
            'dataToko'=>$row
        ];

        return view('onlineShop.editTokoForm', $dataToko);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TokoOnline  $tokoOnline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_toko'=> 'required',
            'nama_platform'=> 'required',
        ]);

        $query = DB::table('toko_online')->where('id', $request->input('dataID'))
            ->update([
                'nama_toko'=>$request->input('nama_toko'),
                'nama_platform'=>$request->input('nama_platform'),
            ]);
        return redirect('/showShop')->with('success', 'Data Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TokoOnline  $tokoOnline
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('toko_online')->where('id', $id)->delete();
        return redirect('/showShop')->with('success', 'Data Dihapus');
    }
}
