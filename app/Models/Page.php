<?php namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

/**
 * App\Models\Page
 *
 * @property-read mixed $last_modified
 * @property-read mixed $params
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PageTranslation[] $translations
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $template
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereUpdatedAt($value)
 */
class Page extends Model {

#	use \Dimsav\Translatable\Translatable;
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
	public $translatedAttributes = ['title', 'slug', 'content', 'seo_title', 'seo_meta_description', 'seo_meta_keywords', 'status', 'visibility', 'locale'];
    protected $fillable = ['title'];
    protected $appends = array('last_modified');

    public static function boot()
    {
        parent::boot();

        // cause a delete of a product to cascade to children so they are also deleted
        static::deleted(function($page)
        {
            $page->translations()->delete();
        });
    }

    public function translations()
    {
        return $this->hasMany('\App\Models\PageTranslation');
    }

    public function getLastModifiedAttribute()
    {
        return $this->updated_at->lt(Carbon::minValue()) ? "Never" : $this->updated_at->format('jS M Y, h:i');
    }

	public function getParamsAttribute($value) {
        if(!is_null($value))
            return json_decode($value);
        return [];
    }

}
