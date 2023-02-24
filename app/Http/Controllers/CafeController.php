<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Kitchen;
use Illuminate\Http\Request;

class CafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cafes = Cafe::paginate(4);
        return view('client.cafes.index', compact('cafes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cafe  $cafe
     * @return \Illuminate\Http\Response
     */
    public function show(Cafe $cafe)
    {
        $kitchens = Kitchen::all();
        return view('client.cafes.show', compact('cafe', 'kitchens'));
    }




}
