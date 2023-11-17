<?php

namespace App\Models\Table\PajakApp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsPegawai extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'ms_pegawai';
    protected $primarykey = 'id';

    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
}
