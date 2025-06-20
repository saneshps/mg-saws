<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
   use HasFactory;
   protected $fillable = [
      'product_id', 'file_name', 'image_alt'
   ];
   public function products()
   {
      return $this->belongsTo(Product::class);
   }
}
