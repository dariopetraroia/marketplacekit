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
 * App\Models\ListingBookedDate
 *
 * @property-read mixed $booked_date_string
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedDate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedDate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedDate query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $listing_id
 * @property \Illuminate\Support\Carbon|null $booked_date
 * @property int|null $quantity
 * @property int|null $available_units
 * @property int|null $is_available
 * @property float|null $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedDate whereAvailableUnits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedDate whereBookedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedDate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedDate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedDate whereIsAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedDate whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedDate wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedDate whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingBookedDate whereUpdatedAt($value)
 */
class ListingBookedDate extends Model
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
	   protected $fillable = [
          'listing_id', 'booked_date', 'is_available'
    ];

	   protected $casts = [
          'booked_date' => 'date'
    ];

	   public function getBookedDateStringAttribute() {
	       return $this->booked_date->format("d-m-Y");
       }
   
}
