<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    use HasFactory;

    protected $table = 'stock';
<<<<<<< Updated upstream
=======
    protected $fillable = [
        'stockName',
        'stockCount',
        'stockType',
        'stockPrice',
        'stockBrand'
    ];
>>>>>>> Stashed changes
}
