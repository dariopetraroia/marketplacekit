<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\CustomFile
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomFile query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $path
 * @property string|null $contents
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomFile whereContents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomFile wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomFile whereUpdatedAt($value)
 */
class CustomFile extends Model
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;

    protected $fillable = [
        'path', 'contents',
    ];

}
