<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PaymentGateway
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $gateway_id
 * @property string|null $token
 * @property array|null $metadata
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway whereGatewayId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway whereMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway whereUserId($value)
 */
class PaymentGateway extends Model
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;

    protected $fillable = [
        'name', 'gateway_id', 'token', 'metadata', 'user_id'
    ];
	
	protected $casts = [
		'metadata' => 'json',
    ];

}
