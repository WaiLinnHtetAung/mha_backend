<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'date', 'title', 'content'
    ];

    public function newsImages() {
        return $this->hasMany(NewsImage::class);
    }
}
