<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    use HasFactory;

    protected $fillable = ['generation_name'];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'items_generation');
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'platform_generation');
    }
}
