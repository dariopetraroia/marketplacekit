<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Comment
 *
 * @property-read \App\Models\User $commenter
 * @property-read mixed $rating
 * @property-read \App\Models\Listing $listing
 * @property-read \App\Models\User $seller
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $listing_id
 * @property int|null $seller_id
 * @property int|null $commenter_id
 * @property string $comment
 * @property bool $approved
 * @property float|null $rate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCommenterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereUpdatedAt($value)
 */
class Comment extends Model
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
	protected $fillable = [
        'comment',
        'rate',
        'approved',
        'listing_id',
        'commenter_id',
        'seller_id',
    ];

    protected $casts = [
        'approved' => 'boolean'
    ];
	
    public function listing()
    {
        return $this->belongsTo('App\Models\Listing');
    }	
	
    public function commenter()
    {
        return $this->belongsTo('App\Models\User', 'commenter_id');
    }
	
    public function seller()
    {
        return $this->belongsTo('App\Models\User', 'seller_id');
    }
	
    public function getRatingAttribute()
    {
        return (int) $this->rate;
    }

    /**
     * @return $this
     */
    public function approve()
    {
        $this->approved = true;
        $this->save();

        return $this;
    }
}
