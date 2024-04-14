<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardHero;
use Carbon\Carbon;

class CardHeroController extends Controller
{
    public function store_HeroCard(Request $request)
    {
        try{
            $cardsHero = new CardHero;
            $cardsHero->name=$request->name;
            $cardsHero->heroImage=$request->heroImage;
            $cardsHero->talentDescription=$request->talentDescription;
            $cardsHero->talentCooldown=$request->talentCooldown;
            $cardsHero->talentType=$request->talentType;
            $cardsHero->talentValue=$request->talentValue;
            $cardsHero->created_at=Carbon::now();
            $cardsHero->updated_at=Carbon::now();
            $cardsHero->save();

            return response()->json([

                'message' => 'Card Added Successfully',
                'cardHero' => $cardsHero,
                'status' =>200
            ]);

        }catch (\Exception $e)
            {
                return response()->json([

                    'message' => 'Card Not Added',
                    'cardHero' => $cardsHero,
                    'status' =>201,
                    '4' => $e,
                ]);
            }
    }

    public function showCard($id)
    {
        $cardHero = CardHero::find($id);

        if (!$cardHero) {

            return response()->json([
                'message' => 'Card not found',
                'status' => 404,
            ]);
        }

        return response()->json([
            'cardHero' => $cardHero,
            'message' => 'Card details retrieved successfully',
            'status' => 200
        ]);
    }

    public function deleteCard($id)
    {
        $cardHero = CardHero::find($id);

        if (!$cardHero) {

            return response()->json([
                'message' => 'Card not found',
                'status' => 404,
            ]);
        }

        $cardHero->delete();

        return response()->json([
            'message' => 'Card deleted successfully',
            'status' => 200
        ]);
    }

}
