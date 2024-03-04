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

    public function store(Request $request)
    {
        $card = new Cards;
        $card->name = $request->name;
        $card->description = $request->description;
        $card->save();
        return response()->json([
            "message" => "Card Added."
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $card = Cards::find($id);
        if ($card) {
            $card->name = $request->name ?? $card->name;
            $card->description = $request->description ?? $card->description;
            $card->save();
            return response()->json([
                "message" => "Card updated successfully."
            ]);
        } else {
            return response()->json([
                "message" => "Card not found."
            ], 404);
        }
    }

    public function show($id)
    {
        $card = Cards::find($id);
        if ($card) {
            return response()->json($card);
        } else {
            return response()->json([
                "message" => "Card not found."
            ], 404);
        }
    }

    public function destroy($id)
    {
        $card = Cards::find($id);
        if ($card) {
            $card->delete();
            return response()->json([
                "message" => "Card deleted successfully."
            ]);
        } else {
            return response()->json([
                "message" => "Card not found."
            ], 404);
        }
}
