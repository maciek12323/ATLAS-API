<?php

namespace App\Http\Controllers;

use App\Models\CardAttack;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CardAttackController extends Controller
{
    public function store_AttackCard(Request $request)
    {
        try{
            $cardsAttack = new CardAttack;
            $cardsAttack->element=$request->element;
            $cardsAttack->energyCost=$request->energyCost;
            $cardsAttack->cardName=$request->cardName;
            $cardsAttack->cardImage=$request->cardImage;
            $cardsAttack->cardBasicDescription=$request->cardBasicDescription;
            $cardsAttack->cardGoldDescription=$request->cardGoldDescription;
            $cardsAttack->type=$request->type;
            $cardsAttack->AttackLeft=$request->AttackLeft;
            $cardsAttack->AttackFront=$request->AttackFront;
            $cardsAttack->AttackRight=$request->AttackRight;
            $cardsAttack->created_at=Carbon::now();
            $cardsAttack->updated_at=Carbon::now();
            $cardsAttack->save();

            return response()->json([

                'message' => 'Card Added Successfully',
                'cardAttack' => $cardsAttack,
                'status' =>200
            ]);

        }catch (\Exception $e)
        {
            return response()->json([

                'message' => 'Card Not Added',
                'cardAttack' => $cardsAttack,
                'status' =>201,
                '4' => $e,
            ]);
        }
    }

    public function showCard($id)
    {
        $cardAttack = CardAttack::find($id);

        if (!$cardAttack) {

            return response()->json([
                'message' => 'Card not found',
                'status' => 404,
            ]);
        }

        return response()->json([
            'cardAttack' => $cardAttack,
            'message' => 'Card details retrieved successfully',
            'status' => 200
        ]);
    }

    public function deleteCard($id)
    {
        $cardAttack = CardAttack::find($id);

        if (!$cardAttack) {

            return response()->json([
                'message' => 'Card not found',
                'status' => 404,
            ]);
        }

        $cardAttack->delete();

        return response()->json([
            'message' => 'Card deleted successfully',
            'status' => 200
        ]);
    }
}
