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
 * App\Models\ListingAdditionalOption
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingAdditionalOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingAdditionalOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingAdditionalOption query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $listing_id
 * @property float|null $price
 * @property string|null $name
 * @property int|null $position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingAdditionalOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingAdditionalOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingAdditionalOption whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingAdditionalOption whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingAdditionalOption wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingAdditionalOption wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingAdditionalOption whereUpdatedAt($value)
 */
class ListingAdditionalOption extends Model
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
	protected $casts = [
          'meta' => 'json',
    ];


    protected $fillable = [
        'position', 'name', 'price', 'listing_id'
    ];
   
}
