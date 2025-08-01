<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'beds', 'price', 'street', 'street_number', 'baths', 'area', 'city', 'code'
    ];

}
