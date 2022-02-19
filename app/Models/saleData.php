<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saleData extends Model
{
    use HasFactory;
    protected $table = 'sale_data';
    protected $fillable = [
        'item_name','bill_no','bill_date','sales_to_customer_name','quantity_in_kgltr','batch_no','mfg_date','exp_date', 'site_id','document_type','identity','client'
    ]; 
}
