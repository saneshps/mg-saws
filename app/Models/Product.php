<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'desc', 'slug', 'option', 'package', 'video_link', 'category', 'model_no',  'image', 'metatitle', 'metadescription', 'image_alt'
    ];

    public function images()
    {
        return $this->hasMany(App\Models\images::class, 'product_id');
    }
    public function graphs()
    {
        return $this->hasMany(App\Models\graph::class, 'product_id');
    }
    public function videos()
    {
        return $this->hasMany(App\Models\videos::class, 'product_id');
    }
}
