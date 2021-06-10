<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FileExportToped;
use App\Exports\FileExportShopee;

class ExportController extends Controller
{
    public function exportToped($id){
        return (new FileExportToped)->getID($id)->download($id.'_toped.xlsx');
    }

    public function exportShopee($id){
        return (new FileExportShopee)->getID($id)->download($id.'_shopee.xlsx');
    }
}
