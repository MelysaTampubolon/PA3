<?php

namespace App\Http\Controllers;

use App\Models\RiwayatFetchData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function destroy(RiwayatFetchData $riwayatFetchData)
    {
        //
    }
}
