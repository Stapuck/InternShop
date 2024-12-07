<?php

namespace App\Http\Controllers;
use App\Models\LocalisationHasCompany;
use Illuminate\Http\Request;

class LocalisationHasCompanyController extends Controller
{
    public function index()
    {
        $Localisations_has_CompaniesList = LocalisationhasCompany::all();

        return view('Localisations_has_Companies.index', ["Localisations_has_CompaniesList" => $Localisations_has_CompaniesList] );
    }

    // Create
    public function create()
    {
        return view('Localisations_has_Companies.create');
    }

    // Store
    public function store(Request $request)
    {
        $Localisations_has_CompaniesList = LocalisationhasCompany::create($request->all());
        return redirect('/Localisations_has_Companies');
    }

    // Show
    public function show(string $id){
        return view('Localisations_has_Companies.show', ['item' => LocalisationhasCompany::findOrFail($id)]);
    }



    public function edit(string $id){
        return view('Localisations_has_Companies.edit', [
            'requestItem' => LocalisationhasCompany::findOrFail($id)
        ]);

    }
    public function update(Request $request, string $id){
        LocalisationhasCompany::where('id', $id)->update($request->except('_token'));
        return redirect("/Localisations_has_Companies");
    }

    public function destroy(Request $request, string $id){
        LocalisationhasCompany::where('id',$id)->delete($request->except('_token'));
        return redirect("/Localisations_has_Companies");
    }
}
