<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'sub_heading',
        'section_1',
        'button',
        'image',
        'section_2',
        'section_3'
    ];
    protected $table = "about";
}
