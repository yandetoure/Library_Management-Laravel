<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::all();
        return view('Categories/show',compact('categories'));
    }
    public function create(){
    return view('Categories/create');
}
    public function store(Request $request){
        $request->validate([
            'title' =>'required',
            'description' =>'required',
        ]);
        Categorie::create($request->all());
        return redirect()->route('categories.show')->with('succes','La catégorie a été ajoutée avec succès') ;
    }
    public function show(){
        return view ('categories.show', compact('categories'));
    }
    
    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('Categories.edit', compact('categorie'));
    }

    public function update(Request $request, Categorie $categorie)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        $categorie->update($request->all());
        return redirect()->route('categories.show')
                         ->with('success', 'Catégorie modifiée avec succés.');
    }

    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('categories.show')
                         ->with('success', 'Catégorie supprimée avec succés .');
    }
}
