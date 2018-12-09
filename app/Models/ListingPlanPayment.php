<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ListingPlanPayment
 *
 * @property-read \App\Models\Listing $listing
 * @property-read \App\Models\ListingPlan $listing_plan
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlanPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlanPayment newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ListingPlanPayment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlanPayment query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ListingPlanPayment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ListingPlanPayment withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $user_id
 * @property int|null $listing_id
 * @property int|null $listing_plan_id
 * @property string|null $started_at
 * @property string|null $ends_at
 * @property mixed|null $meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlanPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlanPayment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlanPayment whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlanPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlanPayment whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlanPayment whereListingPlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlanPayment whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlanPayment whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlanPayment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingPlanPayment whereUserId($value)
 */
class ListingPlanPayment extends Model
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
    use SoftDeletes;

    protected $fillable = [
        "user_id", "listing_id", "listing_plan_id", "started_at", "ends_at"
    ];

    public function payments()
    {
        return $this->morphMany('App\Models\Payment', 'payable');
    }

    public function listing()
    {
        return $this->belongsTo('\App\Models\Listing');
    }

    public function listing_plan()
    {
        return $this->belongsTo('\App\Models\ListingPlan');
    }

}
