<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Menu
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $locale
 * @property string|null $location
 * @property array|null $items
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereUpdatedAt($value)
 */
class Menu extends Model
{
    //
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $casts = [
        'items' => 'json',
    ];
    public $translatable = ['title', 'url'];
    public $fillable = ['locale'];
}
