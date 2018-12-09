<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Widget
 *
 * @property-read mixed $meta_values
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Widget newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Widget newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Widget query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $title
 * @property string|null $alignment
 * @property string|null $type
 * @property string|null $locale
 * @property array|null $metadata
 * @property string|null $background
 * @property int|null $position
 * @property string|null $style
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Widget whereAlignment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Widget whereBackground($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Widget whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Widget whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Widget whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Widget whereMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Widget wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Widget whereStyle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Widget whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Widget whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Widget whereUpdatedAt($value)
 */
class Widget extends Model
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $fillable = [
        'name', 'hash', 'order', 'parent_id', 'slug'
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    protected $appends = ['meta_values'];

    public function getMetaValuesAttribute()
    {
        dd($this->metadata);
        return json_decode($this->metadata);
    }

}
