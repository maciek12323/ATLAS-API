<?php

namespace App\Http\Controllers;

use App\Models\CardDefend;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CardDefendController extends Controller
{
    public function store_DefendCard(Request $request)
    {
        try{
            $cardsDefend = new CardDefend;
            $cardsDefend->element=$request->element;
            $cardsDefend->energyCost=$request->energyCost;
            $cardsDefend->cardName=$request->cardName;
            $cardsDefend->cardImage=$request->cardImage;
            $cardsDefend->cardBasicDescription=$request->cardBasicDescription;
            $cardsDefend->cardGoldDescription=$request->cardGoldDescription;
            $cardsDefend->type=$request->type;
            $cardsDefend->defLeft=$request->defLeft;
            $cardsDefend->defFront=$request->defFront;
            $cardsDefend->defRight=$request->defRight;
            $cardsDefend->heal=$request->heal;
            $cardsDefend->created_at=Carbon::now();
            $cardsDefend->updated_at=Carbon::now();
            $cardsDefend->save();

            return response()->json([

                'message' => 'Card Added Successfully',
                'cardDefend' => $cardsDefend,
                'status' =>200
            ]);

        }catch (\Exception $e)
        {
            return response()->json([

                'message' => 'Card Not Added',
                'cardDefend' => $cardsDefend,
                'status' =>201,
                '4' => $e,
            ]);
        }
    }

    public function showCard($id)
    {
        $cardDefend = CardDefend::find($id);

        if (!$cardDefend) {

            return response()->json([
                'message' => 'Card not found',
                'status' => 404,
            ]);
        }

        return response()->json([
            'cardDefend' => $cardDefend,
            'message' => 'Card details retrieved successfully',
            'status' => 200
        ]);
    }

    public function deleteCard($id)
    {
        $cardDefend = CardDefend::find($id);

        if (!$cardDefend) {

            return response()->json([
                'message' => 'Card not found',
                'status' => 404,
            ]);
        }

        $cardDefend->delete();

        return response()->json([
            'message' => 'Card deleted successfully',
            'status' => 200
        ]);
    }
}
