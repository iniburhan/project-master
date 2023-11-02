<?php

namespace App\Models\Table\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsCategories extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'ms_categories';
    protected $primarykey = 'id';

    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
}
