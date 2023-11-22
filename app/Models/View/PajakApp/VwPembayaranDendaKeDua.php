<?php

namespace App\Models\View\PajakApp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VwPembayaranDendaKeDua extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'vw_pembayaran_denda_max_ke2';
    protected $primarykey = 'id';

    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
}
