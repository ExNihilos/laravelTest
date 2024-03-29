<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'developer',
        'publisher',
        'genre',
        'description',
        'release_date',
        'price',
        'metacritic'
    ];

//    protected $hidden = [
//        'sales'
//    ];

    public function developer1()
    {
        return $this->belongsTo(Developer::class, 'developer', 'name');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class,'publisher', 'name');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
