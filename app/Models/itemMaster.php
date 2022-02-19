<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemMaster extends Model
{
    use HasFactory;
    protected $table = 'item_master';
    protected $fillable = [
        'item_name','item_number','pack','group','poi','regis_no','identity','client'
    ];

}
