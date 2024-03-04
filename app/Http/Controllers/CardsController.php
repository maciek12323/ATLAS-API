<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cards;

class CardsController extends Controller
{
    public function index()
    {
        $cards = Cards::all();
        return response()->json($cards);
    }
}
