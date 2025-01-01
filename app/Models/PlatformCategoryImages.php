<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatformCategoryImages extends Model
{
    use HasFactory;

    protected $fillable = ['platform_id', 'category_id', 'image_path'];

    // Relationship with Platform
    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
