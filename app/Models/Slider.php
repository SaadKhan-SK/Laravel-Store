<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'heading',
        'discount',
        'heading_2',
        'sub_heading',
        'description',
        'button',
        'image',
    ];
}
