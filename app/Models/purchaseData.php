<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchaseData extends Model
{
    use HasFactory;
    protected $table = 'purchase_data';
    protected $fillable = [
        'item_name','bill_date','vendor_name','batch_number','mfg_date','exp_date','vendor_invoice_no','vendor_invoice_date','quantity_in_kgltr','site_id','document_type','identity','client'
    ];
}
