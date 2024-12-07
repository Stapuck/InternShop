<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $PromotionsList = Promotion::all();

        return view('Promotions.index', ["PromotionsList" => $PromotionsList] );
    }

    // Create
    public function create()
    { 
        $promotion = Promotion::all();
        $etablishment = Establishment::all();
        return view('Promotions.create', compact('promotion', 'etablishment'));
    }

    // Store
    public function store(Request $request)
    {
        $PromotionsList = Promotion::create($request->all());
        return redirect('/Promotions');
    }

    // Show
    public function show(string $id){
        return view('Promotions.show', ['item' => Promotion::findOrFail($id)]);
    }



    public function edit(string $id){
        return view('Promotions.edit', [
            'requestItem' => Promotion::findOrFail($id)
        ]);

    }
    public function update(Request $request, string $id){
        Promotion::where('id', $id)->update($request->except('_token'));
        return redirect("/Promotions");
    }

    public function destroy(Request $request, string $id){
        Promotion::where('id',$id)->delete($request->except('_token'));
        return redirect("/Promotions");
    }
}


// $company = Company::find($id);
//         // $company->offer()->delete(); delete wishlist avec les offres de l'entreprise à sup
//         // $company->offer()->delete(); delete application avec les offres de l'entreprise à sup
//         $company->Offer()->delete();
//         $company->delete();
//         // Company::where('id',$id)->delete($request->except('_token'));
//         return redirect("/Companies");