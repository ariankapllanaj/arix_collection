<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['category_name'];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'items_categories', 'categories_id', 'items_id');
    }

    public function platformImages()
    {
        return $this->hasMany(PlatformCategoryImage::class);
    }
}
