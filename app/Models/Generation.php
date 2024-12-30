<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Generation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['generation_name', 'slug'];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'items_generation');
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'platform_generation', 'generation_id', 'platform_id');
    }

    // Automatically set the slug when creating or updating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($generation) {
            $generation->slug = Str::slug($generation->generation_name);
        });

        static::updating(function ($generation) {
            $generation->slug = Str::slug($generation->generation_name);
        });
    }
}
