<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'small_description',
        'category_id',
        'description',
        'image',
        'discount_percentage',
        'price',
        'vendor_id',
        'publish_date',
        'rejected_reason',
        'tnc',
        'slug',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,"category_id","id");
    }

    public function admin()
    {
        return $this->belongsTo(User::class,"vendor_id","id")->where('role','Admin');
    }
    public function vendor()
    {
        return $this->belongsTo(User::class,"vendor_id","id")->where('role','Vendor');
    }
    public function allProduct()
    {
        return $this->belongsTo(User::class,"vendor_id","id");
    }
    public function gallery()
    {
        return $this->hasMany(ProductGallery::class);
    }
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
