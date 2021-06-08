<?php

namespace App\Http\Controllers;

use App\Models\RiwayatFetchData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;

class RiwayatFetchDataController extends Controller
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
        $getSupp = DB::table('supplier')->get();
        $getConfig = DB::table('file_config')->get();
        return view('sumberData.addSumberDataForm', compact('getSupp', 'getConfig'));
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
            'id_supplier'=> 'required',
            'id_config'=> 'required',
            'deskripsi'=> 'required',
        ]);

        $query = DB::table('riwayat_fetch_data')->insert([
            'supplier_id'=>$request->input('id_supplier'),
            'tanggal_fetch'=>'2021-06-05',
            'deskripsi'=>$request->input('deskripsi'),
            'config_id'=>$request->input('id_config'),
            'user_id'=>'5'
        ]);

        $command1 = 'cd F:\Kuliah\Semester VI\PA 3\App\scrapy-pekan-test\testWithPython\venv\Scripts';
        $command2 = 'activate';
        $command3 = 'cd F:\Kuliah\Semester VI\PA 3\App\scrapy-pekan-test\testWithPython\venv\Scripts\nyobaScrapy\nyobaScrapy';
        if ($request->input('id_config') == "1"){
            $command4 = 'scrapy crawl whisky';
        }
        elseif ($request->input('id_config') == "2"){
            $command4 = 'scrapy crawl vodka';
        }

        if ($query){
            @exec($command1."&&".$command2."&&".$command3."&&".$command4);
            return redirect('/sumberData')->with('success', 'Data Disimpan');
        }
        else{
            return redirect('/addSumberData')->with('error', 'Data yang anda masukkan salah.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RiwayatFetchData  $riwayatFetchData
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataRiwayat = DB::table('riwayat_fetch_data')->find($id);
        $otherData = DB::table('riwayat_fetch_data')->where('riwayat_fetch_data.id', '=', $id)
            ->join('supplier', 'riwayat_fetch_data.supplier_id', '=', 'supplier.id')
            ->join('file_config', 'riwayat_fetch_data.config_id', '=', 'file_config.id')
            ->join('user', 'riwayat_fetch_data.user_id', '=', 'user.id')
            ->select('supplier.nama_toko', 'file_config.nama_file', 'user.nama')->get();
        return view('sumberData.detailSumberData', compact('dataRiwayat', 'otherData'));
//        dd($otherData);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RiwayatFetchData  $riwayatFetchData
     * @return \Illuminate\Http\Response
     */
    public function edit(RiwayatFetchData $riwayatFetchData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RiwayatFetchData  $riwayatFetchData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RiwayatFetchData $riwayatFetchData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RiwayatFetchData  $riwayatFetchData
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('riwayat_fetch_data')->where('id', $id)->delete();
        return redirect('/sumberData')->with('success', 'Data Dihapus');
    }
}
