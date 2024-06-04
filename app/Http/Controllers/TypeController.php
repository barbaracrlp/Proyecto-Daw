<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //
    }

    public function showDesigns($id)
    {
        // Encuentra el tipo o lanza una excepción si no se encuentra
        $type = Type::findOrFail($id);

        // Obtén todos los diseños asociados a este tipo
        $designs = $type->designs;

        // Si no hay diseños asociados a este tipo
        if ($designs->isEmpty()) {
            // Pasa el mensaje a la vista
            $message = 'No designs found';

            // Devuelve la vista con el mensaje
            return view('type.designs', compact('type', 'message'));
        }

        // Devuelve la vista con el tipo y los diseños
        return view('type.designs', compact('type', 'designs'));
    }
}
