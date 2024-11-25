<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'brand',
        'description',
        'subcategory_id',
        'category_id',
        'price',
        'image',
        'status',
        'stock',
    ];
    
    public function subcategory()
    {
        return $this->belongsTo(Subcategories::class, 'subcategory_id', 'id');
    }

    public function category()
    {
        return $this->hasOneThrough(Categories::class, Subcategories::class, 'id', 'id', 'subcategory_id', 'category_id');
    }
}
