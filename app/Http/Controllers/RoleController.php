<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $RolesList = Role::all();

        return view('Roles.index', ["RolesList" => $RolesList] );
    }

    // Create
    public function create()
    {
        return view('Roles.create');
    }

    // Store
    public function store(Request $request)
    {
        $RolesList = Role::create($request->all());
        return redirect('/Roles');
    }

    // Show
    public function show(string $id){
        return view('Roles.show', ['item' => Role::findOrFail($id)]);
    }



    public function edit(string $id){
        return view('Roles.edit', [
            'requestItem' => Role::findOrFail($id)
        ]);

    }
    public function update(Request $request, string $id){
        Role::where('id', $id)->update($request->except('_token'));
        return redirect("/Roles");
    }

    public function destroy(Request $request, string $id){
        Role::where('id',$id)->delete($request->except('_token'));
        return redirect("/Roles");
    }
}
