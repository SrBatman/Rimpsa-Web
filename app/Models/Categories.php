<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'status',
    ];


    public function subcategories()
    {
        return $this->hasMany(Subcategories::class, 'category_id');
    }

    public function products()
    {
    return $this->hasManyThrough(Products::class, Subcategories::class, 'category_id', 'subcategory_id', 'id', 'id');
    }
}
