<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockBalance extends Model
{
    use HasFactory;
    protected $table = 'stock_opening';
    protected $fillable = [
        'item_name','site_id','opening_balance','fy','identity','client'
    ];
}
