<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Design;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function showDesigns($id)
    {
        // Encuentra la categoría
        $category = Category::findOrFail($id);

        // Encuentra los IDs de los diseños asociados a esta categoría en la tabla pivot
        $designIds = $category->designs()->pluck('designs.id')->toArray();

        // Si no hay IDs de diseño, no hay diseños asociados a esta categoría
        if (empty($designIds)) {
            // Pasa el mensaje a la vista
            $message = 'No designs found ';

            // Devuelve la vista con el mensaje
            return view('category.designs', compact('category', 'message'));
        }

        // Busca los diseños correspondientes a los IDs recuperados
        $designs = Design::whereIn('id', $designIds)->get();

        return view('category.designs', compact('category', 'designs'));
    }
}
