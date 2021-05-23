<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental_Details extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle_id', 'rent_date','total', 'duration','approved','user_id'
    ];
}
