<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockReport extends Model
{
    use HasFactory;

    protected $table = 'stock_reports';
    protected $fillable = [
        'report_generated',
        'generation_time',
        'stock_type',
        'stock_level',
        'sales_level'
    ];

    public $timestamps = false;
}