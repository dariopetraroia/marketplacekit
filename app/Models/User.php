<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Avatar;
use App\Traits\CanComment;
use App\Traits\Commentable;
use Cviebrock\EloquentSluggable\Sluggable;
use ChristianKuri\LaravelFavorite\Traits\Favoriteability;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use Kodeine\Metable\Metable;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Spatie\Permission\Traits\HasRoles;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;
use Overtrue\LaravelFollow\Traits\CanLike;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Gerardojbaez\Laraplans\Contracts\PlanSubscriberInterface;
use Gerardojbaez\Laraplans\Traits\PlanSubscriber;
use Depsimon\Wallet\HasWallet;

/**
 * App\Models\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cog\Laravel\Ban\Models\Ban[] $bans
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\ChristianKuri\LaravelFavorite\Models\Favorite[] $favorites
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $followers
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $username
 * @property string|null $slug
 * @property string|null $bio
 * @property string|null $phone
 * @property string $email
 * @property string $trader_type
 * @property string|null $business_vat_id
 * @property string|null $avatar
 * @property string|null $password
 * @property string|null $remember_token
 * @property string|null $gender
 * @property string|null $city
 * @property string|null $region
 * @property string|null $country
 * @property string|null $country_name
 * @property string|null $locale
 * @property int|null $unread_messages
 * @property int|null $is_admin
 * @property string|null $ip_address
 * @property string|null $last_login_at
 * @property string|null $last_login_ip
 * @property string|null $blocked_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $can_accept_payments
 * @property int $verified
 * @property string|null $verification_token
 * @property string|null $banned_at
 * @property string|null $provider
 * @property string|null $provider_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBannedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBlockedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBusinessVatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCanAcceptPayments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereTraderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUnreadMessages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereVerificationToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereVerified($value)
 */
class User extends Authenticatable implements BannableContract, JWTSubject, PlanSubscriberInterface
{
    use Notifiable;
    use SoftDeletes;
    use CanComment;
    use Commentable;
	use Sluggable;
	use Favoriteability;
	use Metable;
    use Bannable;
    use HasRoles;
    use CanFollow, CanLike, CanBeFollowed, CanBeLiked;
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
    use PlanSubscriber;
    use HasWallet;

    protected $canBeRated = true;
    protected $mustBeApproved = false;

	public function getRouteKey()
	{
		return $this->slug;
	}

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

	/**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'username'
            ]
        ];
    }
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'bio', 'display_name', 'gender', 'phone', 'country', 'unread_messages', 'username', 'provider', 'provider_id', 'ip_address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'facebook_app_key', 'facebook_app_secret', 'provider', 'provider_id', 'email'
    ];
    protected $append = [
        'first_name'
    ];
	
	/*public function getSlugAttribute(): string
    {
        if(!$this->slug)
            return str_slug($this->display_name);
        return $this->slug;
    }*/
	
	public function getUrlAttribute() {
		return route('profile', [$this]);
    }

	public function payment_gateways()
    {
        return $this->hasMany('App\Models\PaymentGateway');
    }
	
	public function payment_gateway($gateway) {
		return $this->payment_gateways()->where('name', $gateway)->orderBy('created_at', 'DESC')->first();
	}
	
	public function comments()
    {
        return $this->hasMany(Comment::class, 'seller_id');
    }

    public function getDisplayNameAttribute($value) {
		if(!$value)
			$value = $this->name;
		return $value;
	}
    public function getIsBannedAttribute()
    {
        return $this->isBanned();
    }

    public function getPathAttribute() {
        return store(getDir($this->attributes['id'].'.jpg', 4), $this->attributes['id'].'.jpg');
    }
    public function getAvatarAttribute() {
        if(!$this->attributes['avatar']) {
            $colors = ['E91E63', '9C27B0', '673AB7', '3F51B5', '0D47A1', '01579B', '00BCD4', '009688', '33691E', '1B5E20', '33691E', '827717', 'E65100',  'E65100', '3E2723', 'F44336', '212121'];
            $background = $colors[$this->id%count($colors)];
            return "https://ui-avatars.com/api/?size=256&background=".$background."&color=fff&name=".urlencode($this->display_name);
            #return "https://www.gravatar.com/avatar/".md5($this->email).'?d=mm&s=300&d=mm&';
        }
        return $this->attributes['avatar'];
    }

    public function first_name() {
        try {
            $nameparser = new \HumanNameParser\Parser();
            $name = $nameparser->parse($this->attributes['name']);
            return (string) $name->getFirstName();
        } catch (\Exception $e) {
            return $this->attributes['name'];
        }
    }

    public function groups() {
      return $this->hasMany('App\Models\Group');
    }

    public function listings() {
      return $this->hasMany('App\Models\Listing');
    }

    /*public function comments() {
      return $this->hasMany('App\Models\Comment', 'seller_id');
    }*/

    public function avg_rating() {
      return number_format($this->comments->avg('rating'), 1);
    }

    public function getVerifiedAttribute($value) {
		if($this->is_admin)
			return true;
		return $value;
    }

    public function count_reviews() {
      return $this->comments()->whereNotNull('rate')->count('rate');
    }
    /*
    public function getUnreadMessagesAttribute($value) {
        return max($value, 0);
    }
    */
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token, $this));
    }
}
