<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ListingPlan
 *
 * @property-read \App\Models\Category $category
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ListingPlan onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ListingPlan withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ListingPlan withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $name
 * @property string|null $group
 * @property string|null $description
 * @property float|null $price
 * @property int|null $credits
 * @property int|null $duration_units
 * @property string $duration_period
 * @property int|null $images
 * @property int|null $spotlight
 * @property int|null $priority
 * @property int|null $bold
 * @property int|null $category_id
 * @property int|null $min_price
 * @property int|null $max_price
 * @property mixed|null $meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan whereBold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan whereCredits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan whereDurationPeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan whereDurationUnits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan whereMaxPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan whereMinPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan whereSpotlight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlan whereUpdatedAt($value)
 */
class ListingPlan extends Model
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
    use SoftDeletes;

    protected $fillable = [
        "name", "description", "price", "credits", "duration_units", "duration_period", "images", "featured", "priority",  "additional_price", "category_id", "min_price", "max_price", "group"
    ];
    protected $dates = ['deleted_at'];

//    public function additional_prices()
//    {
//        return $this->hasMany(ListingPlanAdditionalPrice::class);
//    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
