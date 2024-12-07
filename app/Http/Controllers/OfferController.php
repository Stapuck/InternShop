<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    public function index()
    {
        $OffersList = Offer::all();

        return view('Offers.index', ["OffersList" => $OffersList]);
    }

    // Create
    public function create()
    {
        $CompaniesList = Company::all();
        $OffersList = Offer::all();
        return view('Offers.create', compact('CompaniesList', 'OffersList'));
    }

    // Store
    public function store(Request $request)
    {
        $OffersList = Offer::create($request->all());
        return redirect('/Offers');
    }

    // Show
    public function show(string $id)
    {
        return view('Offers.show', ['item' => Offer::findOrFail($id)]);
    }



    public function edit(string $id)
    {
        $CompaniesList = Company::all();
        $OffersList = Offer::all();

        return view('Offers.edit', compact('OffersList', 'CompaniesList'), ['requestItem' => Offer::findOrFail($id)]);

        //compact('CompaniesList','OffersList')
    }

    public function update(Request $request, string $id)
    {
        Offer::where('id', $id)->update($request->except('_token'));
        return redirect("/Offers");
    }

    public function destroy(Request $request, string $id)
    {
        Offer::where('id', $id)->delete($request->except('_token'));
        return redirect("/Offers");
    }

    // public function search(Request $request)
    // {
    //     $search = $_GET['search'];
    //     $offers = Offer::where('detail', 'like', '%' . $search. '%')->get();
    //     return view('Offers/search', ['offers' => $offers]);

    // }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $results = DB::table('offers')->where('detail', 'LIKE', '%' . $search . '%')->get();

        return view('/Offers/search/results', ['results' => $results]);
    }

    

}
