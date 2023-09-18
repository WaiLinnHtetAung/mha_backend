<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Zone extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'slug'
    ];

    public function sub_zones() {
        return $this->hasMany(SubZone::class);
    }

    public function hotels() {
        return $this->hasMany(Hotel::class);
    }
}
