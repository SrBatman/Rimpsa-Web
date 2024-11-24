<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'status', 'category_id'];

    // Relación con la categoría (muchas subcategorías pertenecen a 1 categoría)
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    // Relación con productos (1 subcategoría tiene muchos productos)
    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
