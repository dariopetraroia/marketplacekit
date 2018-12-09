<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ListingFields
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingFields newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingFields newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ListingFields query()
 * @mixin \Eloquent
 */
class ListingFields extends Model
{
    //
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
}
