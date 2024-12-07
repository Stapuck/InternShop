<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Offer;
use App\Models\Company;
use App\Models\Home;
use App\Models\User;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;


class HomeController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        $offers = Offer::all();
        $feedbacks = Feedback::all();
        $users = User::all();
        
        return view('Home.Home', compact('companies', 'offers', 'feedbacks', 'users'));
    }
}
