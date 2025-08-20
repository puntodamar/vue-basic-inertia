<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offer extends Model
{
    protected $fillable = ['amount', 'accepted_at', 'rejected_at', 'listing_id', 'bidder_id'];

    public function listing(): BelongsTo {
        return $this->belongsTo(Listing::class);
    }

    public function bidder(): BelongsTo {
        return $this->belongsTo(User::class, 'bidder_id');
    }
}
