<?php

namespace App\Models\View\PajakApp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VwPemilikKendaraanTerbanyak extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'vw_pemilik_kendaraan_terbanyak';
    protected $primarykey = 'id';

    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
}
