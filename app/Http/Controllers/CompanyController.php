<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Offer;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        $CompaniesList = Company::all();
        return view('Companies.index', compact('CompaniesList'));
    }
    // Create
    public function create()
    {
        return view('Companies.create');
    }

    // Store
    public function store(Request $request)
    {
        $CompaniesList = Company::create($request->all());
        return redirect('/Companies');
    }

    // Show
    public function show(string $id){

        $company=Company::findOrFail($id);
        $offers=Offer::all();
    
        return view('Companies.show', compact('company', 'offers'));
    }

    public function edit(string $id){
        
        return view('Companies.edit', [
            'requestItem' => Company::findOrFail($id)
        ]);

    }
    public function update(Request $request, string $id){
        Company::where('id', $id)->update($request->except('_token'));
        return redirect("/Companies");
    }

    public function destroy(Request $request, string $id){

        $company = Company::find($id);
        // $company->offer()->delete(); delete wishlist avec les offres de l'entreprise à sup
        $company->Offer()->delete();
        $company->delete();
        // Company::where('id',$id)->delete($request->except('_token'));
        return redirect("/Companies");
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $results = DB::table('companies')->where('name', 'LIKE', '%' . $search . '%')->get();

        return view('/Companies/search/results', ['results' => $results]);
    }
}


