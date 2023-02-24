<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodRequest;
use App\Models\Cafe;
use App\Models\Category;
use App\Models\Food;
use App\Models\Kitchen;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();
        return view('admin.foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cafes = Cafe::all();
        $kitchens = Kitchen::all();
        return view('admin.foods.create', compact('cafes', 'kitchens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FoodRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodRequest $request)
    {
        $validated = $request->validated();
        $file = $request->file('picture');
        if(!is_null($file))
        {
            $path = $file->store('pictures/foods', 'public');
            $validated['picture'] = $path;
        }
        $food = Food::create($validated);
        return redirect()->route('admin.foods.index')->with('message', "{$food->name} successfully created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return view('admin.foods.show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        $cafes = Cafe::all();
        $kitchens = Kitchen::all();
        return view('admin.foods.edit', compact('food', 'cafes', 'kitchens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FoodRequest $request
     * @param \App\Models\Food $food
     * @return \Illuminate\Http\Response
     */
    public function update(FoodRequest $request, Food $food)
    {
        $validated = $request->validated();
        if($request->hasFile('picture'))
        {
            $file = $request->file('picture');
            $path = $file->store('pictures/foods', 'public');
            $validated['picture'] = $path;
        }
        $food->update($validated);
        return redirect()->route('admin.foods.index')->with('message', "{$food->name} successfully created");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->route('admin.foods.index');
    }
}
