<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Message
 *
 * @property-read \Nahid\Talk\Conversations\Conversation $conversation
 * @property-read mixed $humans_time
 * @property-read \App\Models\User $receiver
 * @property-read \App\Models\User $sender
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $message
 * @property int $is_seen
 * @property int $deleted_from_sender
 * @property int $deleted_from_receiver
 * @property int $user_id
 * @property int $conversation_id
 * @property string|null $attachments
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereAttachments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereConversationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereDeletedFromReceiver($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereDeletedFromSender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereIsSeen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereUserId($value)
 */
class Message extends \Nahid\Talk\Messages\Message
{
    //
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
    public function getUnreadMessagesCount() {
         return $this->select('id')->where('user_id','!=',auth()->user()->id)->where('is_seen',0)->count();
     }

    public function getSentMessages() {
         return $this->where('user_id', auth()->user()->id)->get();
     }

    public function sender()
    {
        return $this->belongsTo('\App\Models\User', 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo('\App\Models\User', 'user_id');
    }

}
