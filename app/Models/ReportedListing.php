<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
#use App\Traits\MergedBuilder;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use DB;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpUnitsOfMeasure\PhysicalQuantity\Length;
use App\Traits\Commentable;
use App\Traits\HashId;
#use Sofa\Eloquence\Eloquence;
use Date;
use Nicolaslopezj\Searchable\SearchableTrait;
use Sofa\Eloquence\Eloquence;
use \Grimzy\LaravelMysqlSpatial\Eloquent\MergedBuilder as Builder;

/**
 * App\Models\ReportedListing
 *
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReportedListing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReportedListing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReportedListing query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $listing_id
 * @property int $user_id
 * @property string|null $reason
 * @property string|null $notes
 * @property int|null $moderator_id
 * @property string|null $moderator_message
 * @property int|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReportedListing whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReportedListing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReportedListing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReportedListing whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReportedListing whereModeratorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReportedListing whereModeratorMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReportedListing whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReportedListing whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReportedListing whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReportedListing whereUserId($value)
 */
class ReportedListing extends Model
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;

    protected $fillable = [
        'reason', 'notes', 'user_id', 'listing_id'
    ];

    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }

}
