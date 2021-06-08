<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatFetchData extends Model
{
    protected $fillable = ['supplier_id', 'tanggal_fetch', 'deskripsi', 'config_id', 'user_id'];

    protected $table = ['riwayat_fetch_data'];
    use HasFactory;
}
