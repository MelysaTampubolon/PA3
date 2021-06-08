<?php

namespace App\Http\Controllers;

use App\Models\FileConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileConfigController extends Controller
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
        $getSupplier = DB::table('supplier')->get();
        return view('fileConfig.addConfig', compact('getSupplier'));
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
            'nama_file'=> 'required',
            'id_supplier'=> 'required',
        ]);

        $query = DB::table('file_config')->insert([
            'nama_file'=>$request->input('nama_file'),
            'supplier_id'=>$request->input('id_supplier'),
        ]);

        if ($query){
            return redirect('/showConfig')->with('success', 'Data Disimpan');
        }
        else{
            return redirect('/addConfig')->with('error', 'Data yang ada masukkan salah.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileConfig  $fileConfig
     * @return \Illuminate\Http\Response
     */
    public function show(FileConfig $fileConfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileConfig  $fileConfig
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = DB::table('file_config')->where('id', $id)->first();
        $getSupplier = DB::table('supplier')->get();
        $dataConfig = [
            'dataConfig'=>$row
        ];

        return view('fileConfig.editConfig', compact('getSupplier'), $dataConfig);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileConfig  $fileConfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileConfig $fileConfig)
    {
        $request->validate([
            'nama_file'=> 'required',
            'id_supplier'=> 'required',
        ]);

        $query = DB::table('file_config')->where('id', $request->input('dataID'))
            ->update([
                'nama_file'=>$request->input('nama_file'),
                'supplier_id'=>$request->input('id_supplier'),
            ]);
        return redirect('/showConfig')->with('success', 'Data Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileConfig  $fileConfig
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('file_config')->where('id', $id)->delete();
        return redirect('/showConfig')->with('success', 'Data Dihapus');
    }
}
