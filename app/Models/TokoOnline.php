<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokoOnline extends Model
{
    protected $fillable = ['nama_toko', 'nama_platfonm'];

    protected $table = ['toko_online'];
    use HasFactory;
}
