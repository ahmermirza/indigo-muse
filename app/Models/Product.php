<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'on_sale',
        'sale_price',
        'sale_start',
        'sale_end',
        'stock',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
