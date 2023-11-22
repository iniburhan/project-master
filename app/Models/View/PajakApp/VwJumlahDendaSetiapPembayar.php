<?php

namespace App\Models\View\PajakApp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VwJumlahDendaSetiapPembayar extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'vw_jml_denda_setiap_pembayar';
    protected $primarykey = 'id';

    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
}
