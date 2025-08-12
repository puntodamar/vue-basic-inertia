<?php

namespace App\Models;

use App\Policies\ListingImagePolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[UsePolicy(ListingImagePolicy::class)]
class ListingImage extends Model
{
    protected $fillable = ['filename'];
    protected $appends = ['src'];

    public function listing() :BelongsTo {
        return $this->belongsTo(Listing::class);
    }

    public function getSrcAttribute() : string {
//        return asset('storage/listings' . $this->attributes['filename']);
        return asset("storage/images/listings/{$this->attributes['filename']}");
    }
}
