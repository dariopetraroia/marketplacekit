<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ListingService
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingService query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $listing_id
 * @property string|null $name
 * @property int|null $duration
 * @property float|null $price
 * @property int|null $stock
 * @property int|null $position
 * @property array|null $meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingService whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingService whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingService whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingService whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingService wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingService wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingService whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingService whereUpdatedAt($value)
 */
class ListingService extends Model
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $casts = [
        'meta' => 'json',
    ];


    protected $fillable = [
        'position', 'name', 'duration', 'price', 'listing_id'
    ];
}
