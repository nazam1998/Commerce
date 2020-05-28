<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::paginate(12);
        return view('admin.produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('admin.produits.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prix' => 'required|numeric|between:0,99999.99',
            'image' => 'required|image',
            'etat' => 'required|string',
            'categorie' => 'required',
            'categorie.*' => 'integer|min:1|max:' . count(Categorie::all()),
        ]);

        $image = Storage::disk('public')->put('', $request->image);
        $produit = new Produit();
        $produit->nom = $request->nom;
        $produit->prix = $request->prix;
        $produit->etat = $request->etat;
        $produit->image = $image;
        $produit->save();
        $produit->categories()->attach($request->categorie);
        return redirect()->route('produit.index')->with('msg', 'Nouveau Produit ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        return view('admin.produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $categories = Categorie::all();
        return view('admin.produits.edit', compact('produit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prix' => 'required|numeric|between:0,99999.99',
            'image' => 'nullable|image',
            'etat' => 'required|string',
            'categorie' => 'required',
            'categorie.*' => 'integer|min:1|max:' . count(Categorie::all()),
        ]);
        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($produit->image)) {
                Storage::disk('public')->delete($produit->image);
            }
            $image = Storage::disk('public')->put('', $request->image);
            $produit->nom = $image;
        }

        $produit->nom = $request->nom;
        $produit->prix = $request->prix;
        $produit->etat = $request->etat;
        $produit->save();

        $produit->categories()->detach();
        $produit->categories()->attach($request->categorie);

        return redirect()->route('produit.index')->with('msg', 'Produit modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        if (Storage::disk('public')->exists($produit->image)) {
            Storage::disk('public')->delete($produit->image);
        }
        $produit->delete();
        return redirect()->route('produit.index')->with('msg', 'Produit modifié avec succès');
    }
}
