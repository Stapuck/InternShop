<?php

namespace App\Http\Controllers;
use App\Models\Establishment;
use App\Models\Localisation;
use Illuminate\Cache\Lock;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    public function index()
    {
        $EstablishmentsList = Establishment::all();

        return view('Establishments.index', ["EstablishmentsList" => $EstablishmentsList] );
    }

    // Create
    public function create()
    {
        return view('Establishments.create');
    }

    // Store
    public function store(Request $request)
    {
        $EstablishmentsList = Establishment::create($request->all());
        return redirect('/Establishments');
    }

    // Show
    public function show(string $id){
        $EstablishmentsList =Establishment::findOrFail($id);

        return view('Establishments.show', compact('EstablishmentsList'));
    }

    public function edit(string $id){
        return view('Establishments.edit', [
            'requestItem' => Establishment::findOrFail($id)
        ]);

    }
    public function update(Request $request, string $id){
        Establishment::where('id', $id)->update($request->except('_token'));
        return redirect("/Establishments");
    }

    public function destroy(Request $request, string $id){
        Establishment::where('id',$id)->delete($request->except('_token'));
        return redirect("/Establishments");
    }
}
