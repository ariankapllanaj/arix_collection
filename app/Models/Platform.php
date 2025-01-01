<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['platform_name'];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'items_platforms');
    }

    public function generations()
    {
        return $this->belongsToMany(Generation::class, 'platform_generation', 'platform_id', 'generation_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'items_categories', 'items_id', 'categories_id')
            ->join('items_platforms', 'items_categories.items_id', '=', 'items_platforms.item_id')
            ->where('items_platforms.platform_id', $this->id);
    }

    public function categoryImages()
    {
        return $this->hasMany(PlatformCategoryImages::class);
    }
}
