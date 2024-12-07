<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $usersList = User::all();

        return view('Users.index', ["usersList" => $usersList]);
    }

    // Create
    public function create()
    {
        return view('Users.create');
    }

    // Store
    public function store(Request $request)
    {
        $usersList = User::create($request->all());
        return redirect('/Users');
    }

    //show
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('Users.show', compact('user'));

        //     return view('Users.show', ['usersList' => User::findOrFail($id)]);
    }

    //edit
    public function edit(string $id)
    {
        return view('Users.edit', [
            'requestItem' => User::findOrFail($id)
        ]);
    }

    //update
    public function update(Request $request, string $id)
    {
        User::where('id', $id)->update($request->except('_token'));
        return redirect("/Users");
    }

    //delete
    public function destroy(Request $request, string $id)
    {
        User::where('id', $id)->delete($request->except('_token'));
        return redirect("/Users");
    }


    public function search(Request $request)
    {
        $search = $request->input('search');

        $results = DB::table('users')->where('first_name', 'LIKE', '%' . $search . '%')
        ->orwhere('last_name', 'LIKE', '%' . $search . '%')
        ->orwhere('birth_date', 'LIKE', '%' . $search . '%')->get();

        return view('/Users/search/results', ['results' => $results]);
    }


    // test affichage la promo du pilote 
    // public function pilote( auth()->id_role  $idr, user->id_promo $idp){
    //     $classe = User::Where('promotion_id',$idr)->where(function ($query) {
    //         $query->where('votes', '>', 100)
    // }

    // public function pilote( auth()->id_role  $idr, user->id_promo $idp){
    //     $classe = User::Where('promotion_id',$idr)->where('id_role',  $idp) 
    // }


    // faire pareil pour afffichage le pilote de l'eleve 
    // select * from users
    // where id_promo = 2   (A2)
    // where id_role = 3 (student)
}
