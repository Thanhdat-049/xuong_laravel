<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catelogue;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'catelogue_id',
        'sku',
        'img_thumbnail',
        'price_regular',
        'price_sale',
        'description',
        'content',
        'material',
        'user_manual',
        'views',
        'is_active',
        'is_hot_deal',
        'is_new',
        'is_show_home',
    ];

    protected $casts = [
        'is_hot_deal' => 'boolean',
        'is_new' => 'boolean',
        'is_show_home' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function catelogue(){
        return $this->belongsTo(Catelogue::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
