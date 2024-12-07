<?php

namespace App\Http\Controllers;
use App\Models\Localisation;
use Illuminate\Http\Request;

class LocalisationController extends Controller
{
    public function index()
    {
        $LocalisationsList = Localisation::all();

        return view('Localisations.index', ["LocalisationsList" => $LocalisationsList] );
    }

    // Create
    public function create()
    {
        return view('Localisations.create');
    }

    // Store
    public function store(Request $request)
    {
        $LocalisationsList = Localisation::create($request->all());
        return redirect('/Localisations');
    }

    // Show
    public function show(string $id){
        return view('Localisations.show', ['item' => Localisation::findOrFail($id)]);
    }



    public function edit(string $id){
        return view('Localisations.edit', [
            'requestItem' => Localisation::findOrFail($id)
        ]);

    }
    public function update(Request $request, string $id){
        Localisation::where('id', $id)->update($request->except('_token'));
        return redirect("/Localisations");
    }

    public function destroy(Request $request, string $id){
        Localisation::where('id',$id)->delete($request->except('_token'));
        return redirect("/Localisations");
    }
}
