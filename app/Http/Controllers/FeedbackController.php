<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $FeedbacksList = Feedback::all();
        
        return view('Feedbacks.index', compact('FeedbacksList') );
    }

    // Create
    public function create()
    {
        return view('Feedbacks.create');
    }

    // Store
    public function store(Request $request)
    {
        $FeedbacksList = Feedback::create($request->all());
        return redirect('/Feedbacks');
    }

    // Show
    public function show(string $id){
        return view('Feedbacks.show', ['item' => Feedback::findOrFail($id)]);
    }



    public function edit(string $id){
        return view('Feedbacks.edit', [
            'requestItem' => Feedback::findOrFail($id)
        ]);

    }
    public function update(Request $request, string $id){
        Feedback::where('id', $id)->update($request->except('_token'));
        return redirect("/Feedbacks");
    }

    public function destroy(Request $request, string $id){
        Feedback::where('id',$id)->delete($request->except('_token'));
        return redirect("/Feedbacks");
    }
}
