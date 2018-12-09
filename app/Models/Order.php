<?php

namespace App\Models;

use App\Traits\OrderId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sofa\Eloquence\Eloquence; // base trait
use Sofa\Eloquence\Metable; // extension trait

/**
 * App\Models\Order
 *
 * @property-read mixed $hash
 * @property-read \Sofa\Eloquence\Metable\AttributeBag $meta_attributes
 * @property-read \App\Models\Listing $listing
 * @property-read \Illuminate\Database\Eloquent\Collection|\Sofa\Eloquence\Metable\Attribute[] $metaAttributes
 * @property-read \App\Models\PaymentGateway $payment_gateway
 * @property-read \App\Models\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Order onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Order withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Order withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $listing_id
 * @property int|null $seller_id
 * @property int|null $user_id
 * @property string|null $status
 * @property float|null $amount
 * @property float|null $service_fee
 * @property string|null $currency
 * @property int|null $units
 * @property int|null $payment_gateway_id
 * @property string|null $processor
 * @property string|null $authorization_id
 * @property string|null $capture_id
 * @property string|null $refund_id
 * @property string|null $reference
 * @property array|null $token
 * @property array|null $listing_options
 * @property string|null $choices
 * @property array|null $customer_details
 * @property \Illuminate\Support\Carbon|null $accepted_at
 * @property \Illuminate\Support\Carbon|null $declined_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $ip_address
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereAcceptedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereAuthorizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCaptureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereChoices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCustomerDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereDeclinedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereListingOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order wherePaymentGatewayId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereProcessor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereRefundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereServiceFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUnits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUserId($value)
 */
class Order extends Model
{
    //
    use Eloquence, Metable;
    use SoftDeletes;

    use OrderId;
    protected $casts = [
        'token' => 'array',
        'listing_options' => 'array',
        'user_choices' => 'array',
        'customer_details' => 'array',
    ];
	protected $dates = [
        'accepted_at',
        'declined_at',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $searchableColumns = ['listing.title', 'user.email'];

    protected $searchable = [
        'columns' => [
            'listings.title' => 10,
            'users.name' => 10,
            'users.email' => 10,
        ],
        'joins' => [
            'listings' => ['orders.listing_id','listings.id'],
            'users' => ['orders.user_id','users.id'],
            //'sellers' => ['listings.user_id','listings.id'],
        ],
    ];

    public function getHashAttribute($value) {
        return $this->getRouteKey();
    }

    public function listing() {
      return $this->belongsTo('App\Models\Listing');
    }

    public function payment_gateway() {
      return $this->belongsTo('App\Models\PaymentGateway');
    }

    public function user() {
      return $this->belongsTo('App\Models\User');
    }

}
