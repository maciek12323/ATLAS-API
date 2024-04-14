<?php

namespace App\Http\Controllers;

use App\Models\CardAttack;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CardAttackController extends Controller
{
    public function addAttackCard(Request $request)
    {
        $data = $request->validate(
            [
                'element' => 'required|string|max:190',
                'energyCost' => 'required|integer',
                'cardName' => 'required|string|max:190',
                'cardImage' => 'required|string|max:190',
                'cardBasicDescription' => 'required|string|max:190',
                'cardGoldDescription' => 'required|string|max:190',
                'type' => 'required|string|max:190',
                'AttackLeft' => 'required|integer',
                'AttackFront' => 'required|integer',
                'AttackRight' => 'required|integer',
            ]);

        $cardAttackCard = CardAttack::create([
            'element' => $data['element'],
            'energyCost' => $data['energyCost'],
            'cardName' => $data['cardName'],
            'cardImage' => $data['cardImage'],
            'cardBasicDescription' => $data['cardBasicDescription'],
            'cardGoldDescription' => $data['cardGoldDescription'],
            'type' => $data['type'],
            'AttackLeft' => $data['AttackLeft'],
            'AttackFront' => $data['AttackFront'],
            'AttackRight' => $data['AttackRight']
        ]);

        return response()->json([
            'user' => $cardAttackCard,
            'message' => 'Card Added Successfully',
        ], 201);
    }
}
