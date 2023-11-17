<?php

namespace App\Models\Table\PajakApp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsKendaraan extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'ms_kendaraan';
    protected $primarykey = 'id';

    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
}
