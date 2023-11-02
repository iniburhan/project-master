<?php

namespace App\Models\Table\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxOrders extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'trx_orders';
    protected $primarykey = 'id';

    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
}
