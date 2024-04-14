<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardHero extends Model
{
    use HasFactory;
    protected $table = 'cardsHero';
    protected  $fillable = [
        'name',
        'heroImage',
        'talentDescription',
        'talentCooldown',
        'talentType',
        'talentValue',
    ];
}
