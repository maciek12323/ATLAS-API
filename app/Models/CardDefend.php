<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardDefend extends Model
{
    use HasFactory;
    protected $table = 'cardsDefend';
    protected  $fillable = [
        'element',
        'energyCost',
        'cardName',
        'cardImage',
        'cardBasicDescription',
        'cardGoldDescription',
        'type',
        'defLeft',
        'defFront',
        'defRight',
        'heal'
    ];
}
