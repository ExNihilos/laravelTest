<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable=[
        'text',
        'user_id',
        'game_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Game()
    {
        return $this->belongsTo(Game::class);
    }
}
