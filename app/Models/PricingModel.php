<?php

namespace App\Models;

#use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MergedBuilder;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use DB;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpUnitsOfMeasure\PhysicalQuantity\Length;
use App\Traits\Commentable;
use App\Traits\HashId;
use Sofa\Eloquence\Eloquence;

/**
 * App\Models\PricingModel
 *
 * @property-read mixed $pricing_unit
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $name
 * @property string|null $seller_label
 * @property string|null $widget
 * @property string|null $unit_name
 * @property string|null $duration_name
 * @property string|null $price_display unit/duration
 * @property string|null $breakdown_display unit/duration
 * @property string|null $quantity_label
 * @property int|null $can_accept_payments
 * @property int|null $can_add_variants
 * @property int|null $can_add_shipping
 * @property int|null $can_add_pricing
 * @property int|null $can_add_additional_pricing
 * @property int|null $requires_shipping_address
 * @property int|null $requires_billing_address
 * @property string|null $meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $can_list_multiple_services
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereBreakdownDisplay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereCanAcceptPayments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereCanAddAdditionalPricing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereCanAddPricing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereCanAddShipping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereCanAddVariants($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereCanListMultipleServices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereDurationName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel wherePriceDisplay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereQuantityLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereRequiresBillingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereRequiresShippingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereSellerLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereUnitName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PricingModel whereWidget($value)
 */
class PricingModel extends Model
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $fillable = [
        "name", "widget", "unit_name", "duration_name"
    ];

    public function getPricingUnitAttribute() {
        if($this->price_display == 'unit') {
            return $this->unit_name;
        }
        return $this->duration_name;
    }


}
