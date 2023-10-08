<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatBotResponse extends Model
{
    use HasFactory;

    protected $table = 'chat_bot_responses';

    protected $fillable = [
        'chat_bot_tag_id',
        'response',
    ];

    public function tag()
    {
        return $this->belongsTo(ChatBotTag::class, 'chat_bot_tag_id');
    }
}
