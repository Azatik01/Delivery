<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CafeRequest;
use App\Models\Cafe;
use App\Models\Category;
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
        $cafes = Cafe::all();
        return view('admin.cafes.index', compact('cafes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.cafes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CafeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CafeRequest $request)
    {
        $validated = $request->validated();
        $file = $request->file('picture');
        if(!is_null($file))
        {
            $path = $file->store('pictures/cafes', 'public' );
            $validated['picture'] = $path;
        }
        $cafe = Cafe::create($validated);
        return redirect()->route('admin.cafes.index')->with('message', "{$cafe->name} successfully created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cafe  $cafe
     * @return \Illuminate\Http\Response
     */
    public function show(Cafe $cafe)
    {
        return view('admin.cafes.show', compact('cafe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cafe  $cafe
     * @return \Illuminate\Http\Response
     */
    public function edit(Cafe $cafe)
    {
        $categories = Category::all();
        return view('admin.cafes.edit', compact('cafe', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CafeRequest $request
     * @param \App\Models\Cafe $cafe
     * @return \Illuminate\Http\Response
     */
    public function update(CafeRequest $request, Cafe $cafe)
    {
        $validated = $request->validated();
        if($request->hasFile('picture'))
        {
            $file = $request->file('picture');
            $path = $file->store('pictures/cafes', 'public');
            $validated['picture'] = $path;
        }
        $cafe->update($validated);
        return redirect()->route('admin.cafes.index')->with('message', "{$cafe->name} successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cafe  $cafe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cafe $cafe)
    {
        $cafe->delete();
        return redirect()->route('admin.cafes.index');
    }
}
