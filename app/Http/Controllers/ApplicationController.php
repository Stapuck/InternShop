<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use App\Models\Offer;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $ApplicationsList = Application::all();

        return view('Applications.index', ["ApplicationsList" => $ApplicationsList]);
    }

    // Create
    public function create()
    {
        $application = Application::all();
        $user = User::all();

        return view('Applications.create', compact('application','user'));
    }

    // Store
    public function store(Request $request)
    {
        $ApplicationsList = Application::create($request->all());
        return redirect('/Applications');
    }

    // Show
    public function show(string $id)
    {
        return view('Applications.show', ['item' => Application::findOrFail($id)]);
    }



    public function edit(string $id)
    {
    //     $application = Application::all();
    //     $offer = Offer::all();

        // return view('Application.edit', compact('offer', 'application'), ['requestItem' => Application::findOrFail($id)]);

            return view('Applications.edit', [
                'requestItem' => Application::findOrFail($id)
            ]);
    }

    public function update(Request $request, string $id)
    {
        Application::where('id', $id)->update($request->except('_token'));
        return redirect("/Applications");
    }

    public function destroy(Request $request, string $id)
    {
        Application::where('id', $id)->delete($request->except('_token'));
        return redirect("/Applications");
    }
}
