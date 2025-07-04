<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graph extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',  'graph'
    ];
    public function products()
    {
       return $this->belongsTo(Product::class);
    }
}
