<?php

namespace App\Models;

use App\Models\Zone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubZone extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'zone_id'
    ];

    public function zone() {
        return $this->belongsTo(Zone::class, 'zone_id');
    }

    public function hotels() {
        return $this->hasMany(Hotel::class);
    }
}
