<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
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
        return view('supplier.addSupplierForm');
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
            'link'=> 'required',
            'nama_toko'=> 'required',
        ]);

        $query = DB::table('supplier')->insert([
            'link'=>$request->input('link'),
            'nama_toko'=>$request->input('nama_toko'),
        ]);

        if ($query){
            return redirect('/showSupplier')->with('success', 'Data Disimpan');
        }
        else{
            return redirect('/addSupplier')->with('error', 'Data yang ada masukkan salah.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = DB::table('supplier')->where('id', $id)->first();
        $dataSupplier = [
            'dataSupplier'=>$row
        ];

        return view('supplier.editSupplierForm', $dataSupplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'link'=> 'required',
            'nama_toko'=> 'required',
        ]);

        $query = DB::table('supplier')->where('id', $request->input('dataID'))
        ->update([
            'link'=>$request->input('link'),
            'nama_toko'=>$request->input('nama_toko'),
        ]);
        return redirect('/showSupplier')->with('success', 'Data Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('supplier')->where('id', $id)->delete();
        return redirect('/showSupplier')->with('success', 'Data Dihapus');
    }
}
