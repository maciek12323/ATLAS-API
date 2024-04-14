<?php

namespace App\Http\Controllers;

use App\Models\CardAttack;
use Illuminate\Http\Request;

class CardAttackController extends Controller
{
    public function addCardAttack(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'element' => 'required|string',
            'energyCost' => 'required|integer',
            'cardName' => 'required|string',
            'cardImage' => 'required|string',
            'cardBasicDescription' => 'required|string',
            'cardGoldDescription' => 'required|string',
            'type' => 'required|string',
            'AttackLeft' => 'required|integer',
            'AttackFront' => 'required|integer',
            'AttackRight' => 'required|integer',
        ]);

        // Create a new card instance
        $card = new CardAttack([
            'element' => $validatedData['element'],
            'energyCost' => $validatedData['energyCost'],
            'cardName' => $validatedData['cardName'],
            'cardImage' => $validatedData['cardImage'],
            'cardBasicDescription' => $validatedData['cardBasicDescription'],
            'cardGoldDescription' => $validatedData['cardGoldDescription'],
            'type' => $validatedData['type'],
            'AttackLeft' => $validatedData['AttackLeft'],
            'AttackFront' => $validatedData['AttackFront'],
            'AttackRight' => $validatedData['AttackRight'],
        ]);

        // Save the card to the database
        $card->create();

        // Return a JSON response with the newly created card and a success message
        return response()->json([
            'card' => $card,
            'message' => 'Card added successfully',
        ], 201);
    }
}
