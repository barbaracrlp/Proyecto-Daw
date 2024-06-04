<?php

namespace App\Http\Controllers;

use App\Models\Design;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $designs = Design::with(['collection', 'type', 'categories', 'user'])->get();
        return view('designs.index', compact('designs'));
        // $designs = Design::all();
        // return view('designs.index', compact('designs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show(Design $design)
    {
        //
        // return view('designs.show', compact('design'));
        $design->load(['collection', 'type', 'categories', 'user']);
        return view('designs.show', compact('design'));
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Design $design)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Design $design)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Design $design)
    {
        //
    }
}
