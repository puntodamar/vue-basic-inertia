<?php

namespace App\Models;

use App\Policies\ListingPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PhpParser\Builder;

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

    public function scopeFilter($query, array $filters) {
        foreach ($filters as $field => $value) {
            if (!is_null($value) && $value !== '') {

                if ($field == 'priceFrom') {
                    $query->where('price', '>=', $value);
                }

                else if ($field == 'priceTo') {
                    $query->where('price', '<=', $value);
                }

                else if ($field == 'areaFrom') {
                    $query->where('area', '>=', $value);
                }

                else if ($field == 'areaTo') {

                    $query->where('area', '<=', $value);
                }

                else {
                    if ($value == '6+') {
                        $query->where($field, '>=', 6);
                    } else {
                        $query->where($field, '=', $value);
                    }

                }


            }
        }

        return $query;
    }

}
