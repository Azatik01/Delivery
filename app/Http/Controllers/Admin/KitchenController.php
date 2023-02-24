<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kitchen;
use Illuminate\Http\Request;

class KitchenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kitchens = Kitchen::all();
        return view('admin.kitchens.index', compact('kitchens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kitchens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kitchen = Kitchen::create($request->validate(['name' => 'required']));
        return redirect()->route('admin.kitchens.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kitchen  $kitchen
     * @return \Illuminate\Http\Response
     */
    public function show(Kitchen $kitchen)
    {
        return view('admin.kitchens.show', compact('kitchen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kitchen  $kitchen
     * @return \Illuminate\Http\Response
     */
    public function edit(Kitchen $kitchen)
    {
        return view('admin.kitchens.edit', compact('kitchen'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kitchen  $kitchen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kitchen $kitchen)
    {
        $kitchen->update($request->validate(['name' => 'required']));
        return redirect()->route('admin.kitchens.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kitchen  $kitchen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kitchen $kitchen)
    {
        $kitchen->delete();
        return redirect()->route('admin.kitchens.index');
    }
}
