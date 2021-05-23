<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle_no', 'owner_name','chassis_number', 'telephone_number','vehicle_type', 'rent_per_km','vehicle_name'
    ];
}
