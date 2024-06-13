<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\User;
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

    public function showDesigns($id)
    {
        // Encuentra el tipo o lanza una excepción si no se encuentra
        $user = User::findOrFail($id);

        // Obtén todos los diseños asociados a este tipo
        $designs = $user->designs;

        // Si no hay diseños asociados a este tipo
        if ($designs->isEmpty()) {
            // Pasa el mensaje a la vista
            $message = 'No designs found';

            // Devuelve la vista con el mensaje
            return view('designs.designs', compact('user', 'message'));
        }

        // Devuelve la vista con el tipo y los diseños
        return view('designs.designs', compact('user', 'designs'));
    }
}
