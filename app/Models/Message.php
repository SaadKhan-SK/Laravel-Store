<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    
    protected $fillable = ['inbox_id', 'sender_id', 'receiver_id', 'content', 'read_at'];

    public function inbox()
    {
        return $this->belongsTo(Inbox::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
    public function getProfile()
    {
        return $this->belongsTo(Profile::class,'receiver_id');
    }
}
