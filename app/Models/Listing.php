<?php

namespace App\Models;

use App\Policies\ListingPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Builder;

#[UsePolicy(ListingPolicy::class)]
class Listing extends Model
{
    use HasFactory, SoftDeletes;

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'owner_id',
            'id'
        );
    }

    public function images(): HasMany {
        return $this->hasMany(ListingImage::class);
    }


    protected $fillable = [
        'owner_id', 'beds', 'price', 'street', 'street_number', 'baths', 'area', 'city', 'code'
    ];

    public function scopeIsDeleted(Builder $query): bool {

    }

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

                else if ($field == 'deleted' && $value === true) {
                    $query->withTrashed();
                }

                else if ($field == 'draft') {
                    $query->where('is_draft', $value);
                }


                else if ($field === 'beds' || $field === 'baths') {
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
