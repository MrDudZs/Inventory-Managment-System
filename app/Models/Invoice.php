<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'invoice';
    protected $fillable = [
        'invoiceStaff',
        'invoicePDF',
        'invoiceDate'
    ];
}

