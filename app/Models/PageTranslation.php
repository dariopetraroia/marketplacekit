<?php namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

#use LaravelBook\Ardent\Ardent;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

/**
 * App\Models\PageTranslation
 *
 * @property-read mixed $intro
 * @property-read mixed $last_modified
 * @property-read \App\Models\Page $page
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PageTranslation[] $translations
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageTranslation query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $locale
 * @property string $title
 * @property string $slug
 * @property string|null $content
 * @property string|null $seo_title
 * @property string|null $seo_meta_description
 * @property string|null $seo_meta_keywords
 * @property int $visible
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageTranslation whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageTranslation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageTranslation wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageTranslation whereSeoMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageTranslation whereSeoMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageTranslation whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageTranslation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageTranslation whereVisible($value)
 */
class PageTranslation extends Model {
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
	public $timestamps = true;
    protected $fillable = ['title', 'slug', 'content', 'seo_title', 'locale', 'seo_meta_description', 'seo_meta_keywords', 'status', 'visibility'];
    protected $hidden = ['content'];
	protected $appends = array('intro', 'last_modified');


	public function page()
    {
        return $this->belongsTo('\App\Models\Page');
    }

	public function translations()
    {
        return $this->hasMany('\App\Models\PageTranslation', 'page_id', 'page_id');
    }

	public function getIntroAttribute()
    {
        return str_limit(strip_tags($this->content), 150);
    }

    public function getLastModifiedAttribute()
    {
        $updated_at = $this->updated_at;
        if(!$this->updated_at)
            $updated_at = Carbon::now();

        return $updated_at->lt(Carbon::minValue()) ? "Never" : $updated_at->format('jS M Y, h:i');
    }

}
