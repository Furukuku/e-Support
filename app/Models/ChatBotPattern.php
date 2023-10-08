<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatBotPattern extends Model
{
    use HasFactory;

    protected $table = 'chat_bot_patterns';

    protected $fillable = [
        'chat_bot_tag_id',
        'keyword',
    ];

    public function tag()
    {
        return $this->belongsTo(ChatBotTag::class, 'chat_bot_tag_id');
    }
}
