<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['item_name', 'price', 'description', 'status', 'image'];

    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'items_platforms');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'items_categories');
    }

    public function generations()
    {
        return $this->belongsToMany(Generation::class, 'items_generation');
    }
}
