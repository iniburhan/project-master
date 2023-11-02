<?php

namespace App\Models\Table\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsProducts extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'ms_products';
    protected $primarykey = 'id';

    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
}
