<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['item_name', 'price', 'description', 'status', 'image', 'manual', 'created_at'];

    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'items_platforms', 'item_id', 'platform_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'items_categories', 'items_id', 'categories_id');
    }

    public function generations()
    {
        return $this->belongsToMany(Generation::class, 'items_generation', 'items_id', 'generation_id');
    }
}
