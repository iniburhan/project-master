<?php

namespace App\Models\View\PajakApp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VwJenisPajakTerbanyakDibayar extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'vw_jenis_pajak_terbanyak_dibayar';
    protected $primarykey = 'id';

    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
}
