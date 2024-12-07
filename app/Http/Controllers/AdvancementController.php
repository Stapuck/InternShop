<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advancement;
class AdvancementController extends Controller
{
    public function index()
    {
        $AdvancementsList = Advancement::all();

        return view('Advancements.index', ["AdvancementsList" => $AdvancementsList] );
    }

    // Create
    public function create()
    {
        return view('Advancements.create');
    }

    // Store
    public function store(Request $request)
    {
        $AdvancementsList = Advancement::create($request->all());
        return redirect('/Advancements');
    }

    // Show
    public function show(string $id){
        return view('Advancements.show', ['item' => Advancement::findOrFail($id)]);
    }



    public function edit(string $id){
        return view('Advancements.edit', [
            'requestItem' => Advancement::findOrFail($id)
        ]);

    }
    public function update(Request $request, string $id){
        Advancement::where('id', $id)->update($request->except('_token'));
        return redirect("/Advancements");
    }

    public function destroy(Request $request, string $id){
        Advancement::where('id',$id)->delete($request->except('_token'));
        return redirect("/Advancements");
    }
}
