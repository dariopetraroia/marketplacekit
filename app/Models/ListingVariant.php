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
 * App\Models\ListingVariant
 *
 * @property-read mixed $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingVariant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingVariant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingVariant query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $listing_id
 * @property float|null $price
 * @property int|null $stock
 * @property array|null $meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingVariant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingVariant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingVariant whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingVariant whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingVariant wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingVariant whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingVariant whereUpdatedAt($value)
 */
class ListingVariant extends Model
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
	   protected $casts = [
          'meta' => 'json',
    ];

    public function getNameAttribute() {
        if($this->meta) {
            $meta = $this->meta;
            ksort($meta);
            return implode(",", array_values($meta));
        }
        return "unknown";
    }
   
}
