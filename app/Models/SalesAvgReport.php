<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesAvgReport extends Model
{
    use HasFactory;

    protected $table = 'sales_avg_report';
    protected $fillable = [
        'report_generated',
        'generation_time',
        'total_avg_levels',
        'total_avg_sales'
    ];

    public $timestamps = false;
}