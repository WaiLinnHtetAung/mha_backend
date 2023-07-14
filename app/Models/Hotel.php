<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image', 'owner', 'sr_no', 'total_room', 'phone', 'email', 'address', 'web_link',
        'sub_zone_id', 'zone_id'
    ];

    public function sub_zone() {
        return $this->belongsTo(SubZone::class, 'sub_zone_id');
    }

    public function zone() {
        return $this->belongsTo(Zone::class, 'zone_id');
    }
}
