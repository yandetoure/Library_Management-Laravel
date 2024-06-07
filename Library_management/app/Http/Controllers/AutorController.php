<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    public function index(){
        return view('autors/show', compact('autors'));
    }
}

class CategorieController extends Controller
{
    public function index(){
        $autors = Autor::all();
        return view('autors/show',compact('autors'));
    }
    public function create(){
    return view('Autors/create');
}
    public function store(Request $request){
        $request->validate([
            'title' =>'required',
            'description' =>'required',
        ]);
        Autor::create($request->all());
        return redirect()->route('autors.show')->with('succes','L\auteur a été ajouté avec succès') ;
    }
    public function show(){
        return view ('autors.show', compact('autors'));
    }
    
    public function edit($id)
    {
        $autor = Autor::findOrFail($id);
        return view('Autors.edit', compact('autor'));
    }

    public function update(Request $request, Autor $autor)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        $autor->update($request->all());
        return redirect()->route('autors.show')
                         ->with('success', 'Auteur modifié avec succés.');
    }

    public function destroy(Autor $autor)
    {
        $autor->delete();
        return redirect()->route('categories.show')
                         ->with('success', 'L\auteur supprimé avec succés .');
    }
}
