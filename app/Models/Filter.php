<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Filter
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Filter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Filter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Filter query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $position
 * @property string|null $name
 * @property string|null $field
 * @property string|null $search_ui
 * @property string|null $form_input_type
 * @property array|null $form_input_meta
 * @property int|null $is_category_specific
 * @property int|null $is_searchable
 * @property int|null $is_hidden
 * @property int|null $is_default
 * @property array|null $categories
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Filter whereCategories($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Filter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Filter whereField($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Filter whereFormInputMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Filter whereFormInputType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Filter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Filter whereIsCategorySpecific($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Filter whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Filter whereIsHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Filter whereIsSearchable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Filter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Filter wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Filter whereSearchUi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Filter whereUpdatedAt($value)
 */
class Filter extends Model
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;

    protected $casts = [
          'form_input_meta' => 'array',
          'categories' => 'array',
      ];
}
