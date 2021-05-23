<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'vehicale_id','telephone_number', 'license_no','address', 'email'
    ];
}
