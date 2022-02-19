<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSites extends Model
{
    use HasFactory;
    protected $table = 'identity_client_sites';
    protected $fillable = [
        'identity','group','client','sites'
    ];
}
