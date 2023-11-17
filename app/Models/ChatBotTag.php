<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatBotTag extends Model
{
    use HasFactory, SoftDeletes;

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
