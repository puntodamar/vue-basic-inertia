<?php

namespace App\Models;

use App\Policies\ListingPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[UsePolicy(ListingPolicy::class)]
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
