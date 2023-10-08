<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatBotTag extends Model
{
    use HasFactory;

    protected $table = 'chat_bot_tags';

    protected $fillable = [
        'tag',
    ];

    public function patterns()
    {
        return $this->hasMany(ChatBotPattern::class);
    }

    public function responses()
    {
        return $this->hasMany(ChatBotResponse::class);
    }
}
