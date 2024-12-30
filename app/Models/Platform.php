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
}
