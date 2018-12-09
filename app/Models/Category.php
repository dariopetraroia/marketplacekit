<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nestable\NestableTrait;

/**
 * App\Models\Category
 *
 * @property-read \App\Models\Category $categories
 * @property-read \App\Models\Category $child
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Listing[] $listings
 * @property-read \App\Models\Category $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PricingModel[] $pricing_models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $order
 * @property string $name
 * @property string $slug
 * @property string|null $hash
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereUpdatedAt($value)
 */
class Category extends Model
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
    use NestableTrait;
    
    protected $parent = 'parent_id';

    protected $fillable = [
        'name', 'hash', 'order', 'parent_id', 'slug'
    ];

	public function child()
	{
		return $this->hasOne('App\Models\Category', 'id', 'parent_id');
	}

    public function listings() {
        return $this->hasMany('App\Models\Listing');
    }

    public function categories() {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function pricing_models() {
        return $this->belongsToMany('App\Models\PricingModel');
    }

    public function parent() {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

}
