<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    protected $fillable = [
        'name', 
        'location', 
        'contact_number', 
        'service_type'
    ];
}
