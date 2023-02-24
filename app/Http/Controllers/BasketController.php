<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Food;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index()
    {
        $baskets = Basket::all();
        $foods = Food::all();
        $cost = 0;
        if(!is_null($baskets)){
            foreach ($baskets as $basket)
            {
                foreach ($foods as $food){
                    if($basket->food_id == $food->id)
                    {
                        $cost += $food->price * $basket->qty;
                    }
                }
            }
        }

        return view('client.baskets.index', compact('baskets', 'cost'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'food_id' => 'required',
            'qty' => 'required'
        ]);
        $baskets = Basket::where([
            "user_id" => $request->user()->id, "food_id" => $request["food_id"]
        ])->first();

        if ($baskets == null) {
            $basket = new Basket();
            $basket->user_id = $request->user()->id;
            $basket->food_id = $request["food_id"];
            $basket->qty = $request["qty"];
            $basket->save();
        } else {
            $baskets->qty = $baskets->qty + $request["qty"];
            $baskets->save();
        }
        return response()->json(["basket" => "Блюдо успешно добавлено в корзину"], 201);
    }

    public function update(Request $request, Basket $basket)
    {
        $validated = $request->validate([
            'basket_id' => 'required',
            'qty' => 'required'
        ]);
        $basket->update($validated);
        return response()->json(["basket" => "Успешно обновлен"], 201);
    }

    public function destroy(Basket $basket)
    {
        $basket->delete();
        return response()->json(["basket" => "Блюдо успешно удалено"], 204);
    }

    public function deleteAll()
    {
        $baskets = Basket::all();
        foreach ($baskets as $basket)
        {
            $basket->delete();
        }
        return redirect()->route('baskets.index');
    }
}
