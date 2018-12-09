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
 * App\Models\ListingShippingOption
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingShippingOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingShippingOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingShippingOption query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $listing_id
 * @property float|null $price
 * @property string|null $name
 * @property int|null $position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingShippingOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingShippingOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingShippingOption whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingShippingOption whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingShippingOption wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingShippingOption wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingShippingOption whereUpdatedAt($value)
 */
class ListingShippingOption extends Model
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
	protected $casts = [
          'meta' => 'json',
    ];


    protected $fillable = [
        'position', 'name', 'price', 'listing_id'
    ];
   
}
