<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    use HasFactory;

    protected $fillable = ['owner_id','user_id', 'last_message_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getProfile()
    {
        return $this->belongsTo(Profile::class,'user_id');
    }
    public function lastMessage()
    {
        return $this->belongsTo(Message::class, 'last_message_id');
    }
    public function sender()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
