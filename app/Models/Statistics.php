<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    use HasFactory;
    protected $table = 'statistics';
    protected $fillable = [
        'user_id',
        'games_played',
        'games_won',
        'games_lost',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
