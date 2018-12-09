<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use DB;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpUnitsOfMeasure\PhysicalQuantity\Length;
use App\Traits\Commentable;
use App\Traits\HashId;

/**
 * App\Models\ListingBookedTime
 *
 * @property-read mixed $start_time
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedTime query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $listing_id
 * @property \Illuminate\Support\Carbon|null $booked_date
 * @property int|null $duration
 * @property int|null $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedTime whereBookedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedTime whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedTime whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedTime whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedTime whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedTime whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedTime whereUpdatedAt($value)
 */
class ListingBookedTime extends Model
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $fillable = [
        'listing_id', 'booked_date', 'start_time', 'duration'
    ];

    protected $casts = [
        'booked_date' => 'date'
    ];


    public function getStartTimeAttribute($value) {
        return date('H:i', strtotime($value));
    }
   
}
