<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use HasFactory;

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'owner_id',
            'id'
        );
    }


    protected $fillable = [
        'owner_id', 'beds', 'price', 'street', 'street_number', 'baths', 'area', 'city', 'code'
    ];

}
