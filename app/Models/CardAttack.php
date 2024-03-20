<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardAttack extends Model
{
    use HasFactory;
    protected $table = 'cardsAttack';
    protected  $fillable = [
        'element',
        'energyCost',
        'cardName',
        //'cardImage',
        'cardBasicDescription',
        'cardGoldDescription',
        'type',
        'AttackLeft',
        'AttackFront',
        'AttackRight'
    ];
}
