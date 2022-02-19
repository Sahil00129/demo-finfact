<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentityClientSites extends Model
{
    use HasFactory;
    protected $table = 'group_identity_client_sites';
    protected $fillable = [
        'identity','group','client','sites'
    ];
    
}
