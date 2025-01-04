<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreAndWearhouse extends Model
{
    use HasFactory;

    protected $table = 'store_and_warehouses';

    protected $fillable = [
        'location_name',
        'location_type',
    ];
}
