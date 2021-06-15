<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    use HasFactory;

    protected $fillable = [
      'text'
    ];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }
}
