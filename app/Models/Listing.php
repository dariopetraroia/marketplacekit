<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
#use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use App\Traits\MergedTrait;
use DB;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpUnitsOfMeasure\PhysicalQuantity\Length;
use App\Traits\Commentable;
use App\Traits\HashId;
use Date;
use Nicolaslopezj\Searchable\SearchableTrait;

#use Sofa\Eloquence\Eloquence; keep for later


/**
 * App\Models\Listing
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ListingAdditionalOption[]            $additional_options
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ListingBookedDate[]                  $booked_dates
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ListingBookedTime[]                  $booked_times
 * @property-read \App\Models\Category                                                                      $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[]                            $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\ChristianKuri\LaravelFavorite\Models\Favorite[] $favorites
 * @property-read mixed                                                                                     $carousel
 * @property-read mixed                                                                                     $cover_image
 * @property-read mixed                                                                                     $cover_image_path
 * @property-read mixed                                                                                     $days_ago
 * @property-read mixed                                                                                     $edit_url
 * @property-read int                                                                                       $favorites_count
 * @property-read mixed                                                                                     $human_distance
 * @property-read mixed                                                                                     $images
 * @property-read mixed                                                                                     $is_verified
 * @property-read mixed                                                                                     $photos_limit
 * @property-read mixed                                                                                     $price_formatted
 * @property-read mixed                                                                                     $short_address
 * @property-read mixed                                                                                     $short_description
 * @property-read mixed                                                                                     $slug
 * @property-read mixed                                                                                     $thumbnail
 * @property-read mixed                                                                                     $url
 * @property-read \App\Models\PricingModel                                                                  $pricing_model
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ListingService[]                     $services
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ListingShippingOption[]              $shipping_options
 * @property-read \App\Models\User                                                                          $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ListingVariant[]                     $variants
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing comparison($geometryColumn, $geometry, $relationship)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing contains($geometryColumn, $geometry)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing crosses($geometryColumn, $geometry)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing disjoint($geometryColumn, $geometry)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing distance($geometryColumn, $geometry, $distance)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing distanceExcludingSelf($geometryColumn, $geometry, $distance)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing distanceSphere($geometryColumn, $geometry, $distance)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing distanceSphereExcludingSelf($geometryColumn, $geometry, $distance)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing distanceSphereValue($geometryColumn, $geometry)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing distanceValue($geometryColumn, $geometry)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing doesTouch($geometryColumn, $geometry)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing equals($geometryColumn, $geometry)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing intersects($geometryColumn, $geometry)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Listing onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing overlaps($geometryColumn, $geometry)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing search($search, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing searchRestricted($search, $restriction, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Listing withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing within($geometryColumn, $polygon)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Listing withoutTrashed()
 * @mixin \Eloquent
 * @property int                                                                                            $id
 * @property string|null                                                                                    $key
 * @property int|null                                                                                       $user_id
 * @property int|null                                                                                       $category_id
 * @property string|null                                                                                    $pricing_model_id
 * @property string|null                                                                                    $title
 * @property string|null                                                                                    $blurb
 * @property string|null                                                                                    $photo
 * @property int|null                                                                                       $quantity
 * @property int|null                                                                                       $stock
 * @property array|null                                                                                     $photos
 * @property string|null                                                                                    $description
 * @property \Illuminate\Support\Carbon|null                                                                $spotlight
 * @property \Illuminate\Support\Carbon|null                                                                $expires_at
 * @property \Illuminate\Support\Carbon|null                                                                $priority_until
 * @property string|null                                                                                    $bold_until
 * @property int|null                                                                                       $staff_pick
 * @property int|null                                                                                       $views_count
 * @property string|null                                                                                    $unit
 * @property int|null                                                                                       $min_units
 * @property int|null                                                                                       $max_units
 * @property int|null                                                                                       $min_duration
 * @property int|null                                                                                       $max_duration
 * @property int|null                                                                                       $session_duration
 * @property string|null                                                                                    $pricing_models
 * @property float|null                                                                                     $price
 * @property float|null                                                                                     $price_ex_vat
 * @property string|null                                                                                    $currency
 * @property string|null                                                                                    $location
 * @property float|null                                                                                     $lat
 * @property float|null                                                                                     $lng
 * @property array|null                                                                                     $meta
 * @property string|null                                                                                    $city
 * @property string|null                                                                                    $country
 * @property string|null                                                                                    $seller_type
 * @property array|null                                                                                     $variant_options
 * @property string|null                                                                                    $vendor
 * @property array|null                                                                                     $timeslots
 * @property array|null                                                                                     $tags
 * @property string|null                                                                                    $tags_string
 * @property string|null                                                                                    $units_in_product_display
 * @property string|null                                                                                    $price_per_unit_display
 * @property string|null                                                                                    $locale
 * @property int|null                                                                                       $is_private
 * @property int|null                                                                                       $is_published
 * @property int                                                                                            $is_draft
 * @property string|null                                                                                    $is_admin_verified
 * @property string|null                                                                                    $is_disabled
 * @property \Illuminate\Support\Carbon|null                                                                $created_at
 * @property \Illuminate\Support\Carbon|null                                                                $updated_at
 * @property \Illuminate\Support\Carbon|null                                                                $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereBlurb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereBoldUntil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereIsAdminVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereIsDisabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereIsDraft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereIsPrivate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereMaxDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereMaxUnits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereMinDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereMinUnits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing wherePhotos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing wherePhotosLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing wherePriceExVat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing wherePricePerUnitDisplay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing wherePricingModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing wherePricingModels($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing wherePriorityUntil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereSellerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereSessionDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereSpotlight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereStaffPick($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereTagsString($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereTimeslots($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereUnitsInProductDisplay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereVariantOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereVendor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Listing whereViewsCount($value)
 */
class Listing extends Model
{
    #use Eloquence;
    use MergedTrait;
    use SearchableTrait;
    use Favoriteable;
    use Commentable;
    use SoftDeletes;
    use HashId;
    
    protected $canBeRated     = true;
    protected $mustBeApproved = false;
    
    protected $searchable        = [
        'columns' => [
            'listings.title'       => 10,
            'listings.tags'        => 10,
            'listings.description' => 10,
            'users.display_name'   => 10,
        ],
        'joins'   => [
            'users' => ['users.id', 'listings.user_id'],
        ],
    ];
    protected $searchableColumns = ['title', 'tags', 'description'];
    protected $appends           = ['thumbnail', 'price_formatted', 'url', 'short_description'];
    
    protected $fillable      = [
        'key',
        'title',
        'price',
        'stock',
        'unit',
        'category_id',
        'user_id',
        'short_address',
        'description',
        'spotlight',
        'staff_pick',
        'is_hidden',
        'location',
        'lat',
        'lng',
        'pricing_model_id',
        'photos',
        'city',
        'country',
        'currency',
        'is_draft',
        'session_duration',
        'min_duration',
        'max_duration',
        'locale'
    ];
    protected $casts         = [
        'photos'           => 'array',
        'meta'             => 'json',
        'tags'             => 'array',
        'shipping_options' => 'json',
        'variant_options'  => 'json',
        'timeslots'        => 'json',
    ];
    protected $spatialFields = [
        'location',
    ];
    protected $dates         = ['expires_at', 'spotlight', 'priority_until', 'deleted_at'];
    
    /*protected function newBaseQueryBuilder()
    {
        $conn = $this->getConnection();
        $grammar = $conn->getQueryGrammar();
        return new QueryBuilder(
            $conn,
            $grammar,
            $conn->getPostProcessor(),
            app()->make('lada.handler')
        );
    }*/
    
    public function toggleSpotlight()
    {
        $this->spotlight = ($this->spotlight) ? null : Carbon::now();
        $this->save();
    }
    
    public function getIsVerifiedAttribute()
    {
        return ($this->is_admin_verified && !$this->is_disabled);
    }
    
    public function getDaysAgoAttribute($value)
    {
        return Date::parse($this->created_at)->ago();
    }
    
    public function getHumanDistanceAttribute($value)
    {
        $distance = new Length($this->distance, 'meters');
        
        return __(":value miles", ['value' => number_format($distance->toUnit('miles'), 2)]);
    }
    
    public function getPhotosLimitAttribute($value)
    {
        if (is_null($value)) {
            return setting('photos_per_listing', 20);
        }
        
        return $value;
    }
    
    public function getImagesAttribute()
    {
        if (!$this->photos) {
            return ["http://via.placeholder.com/680x460?text=No%20Image"];
        }
        
        return $this->photos;
    }
    
    public function getCarouselAttribute()
    {
        $images       = [];
        $this->photos = collect($this->photos)->slice(0, setting('photos_per_listing', 20));
        if ($this->photos) {
            foreach ($this->photos as $item) {
                $images[] = $item;
            }
        }
        
        return $images;
    }
    
    public function getSlugAttribute(): string
    {
        return str_slug($this->title);
    }
    
    public function getShortDescriptionAttribute()
    {
        $truncateService = new \Urodoz\Truncate\TruncateService();
        
        return $truncateService->truncate($this->description, 255);
    }
    
    public function getEditUrlAttribute()
    {
        return route('create.edit', [$this]);
    }
    
    public function getUrlAttribute()
    {
        return route('listing', [$this, $this->slug]);
    }
    
    public function getThumbnailAttribute()
    {
        #var_dump($this->photos);die();
        if ($this->photos) {
            foreach ($this->photos as $photo) {
                return $photo;
            }
        }
        
        return "/images/no_image.png";
    }
    
    public function getCoverImageAttribute()
    {
        #var_dump($this->photos);die();
        if ($this->photos) {
            foreach ($this->photos as $photo) {
                return $photo;
            }
        }
        
        return "/images/no_image.png";
    }
    
    public function getPriceFormattedAttribute()
    {
        $price = null;
        if ($this->price) {
            $price = format_money($this->price, $this->currency);
        }
        
        if ($this->pricing_model && $this->pricing_model->widget == 'book_date') {
            $price .= " per " . $this->pricing_model->duration_name;
        }
        if ($this->pricing_model && $this->pricing_model->widget == 'book_time') {
            $price .= " per " . $this->pricing_model->duration_name;
        }
        
        if ($price) {
            return $price;
        }
        
        return null;
    }
    
    public function getCoverImagePathAttribute()
    {
        $hash = md5($this->id);
        
        return 'cover-images/' . $hash[0] . '/' . $hash[1] . '/' . $hash . '.png';
    }
    
    public function getShortAddressAttribute()
    {
        return $this->city . ", " . $this->country;
    }
    
    public function shipping_options()
    {
        return $this->hasMany('\App\Models\ListingShippingOption');
    }
    
    public function additional_options()
    {
        return $this->hasMany('\App\Models\ListingAdditionalOption');
    }
    
    public function booked_dates()
    {
        return $this->hasMany('\App\Models\ListingBookedDate');
    }
    
    public function booked_times()
    {
        return $this->hasMany('\App\Models\ListingBookedTime');
    }
    
    public function variants()
    {
        return $this->hasMany('\App\Models\ListingVariant');
    }
    
    public function category()
    {
        return $this->belongsTo('\App\Models\Category');
    }
    
    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }
    
    public function pricing_model()
    {
        return $this->belongsTo('\App\Models\PricingModel');
    }
    
    public function services()
    {
        return $this->hasMany('\App\Models\ListingService');
    }
    
    public function scopeActive($query)
    {
        return $query->where('is_published', 1)->where('is_draft', 0)->whereNotNull('is_admin_verified')->whereNull('is_disabled')
            ->where(function ($query) {
                $query->whereDate('expires_at', '>=', Carbon::now())
                    ->orWhereNull('expires_at');
            });
    }
    
}
