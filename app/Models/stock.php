<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    use HasFactory;

    protected $primaryKey = 'stockID';
  
    public $timestamps = false;

    protected $table = 'stock';
    protected $fillable = [
        'stockID',
        'stockName',
        'stockCount',
        'stockType',
        'stockPrice',
        'stockBrand',
        'stockSold'
    ];

}


/*
/ Summary:
/ 'public $timestamps = false;'
/ This is to be kept for now to stop errors
/ If possible in next update this will have added tables for created_at and updated_at to audit the interaction with stock 
*/