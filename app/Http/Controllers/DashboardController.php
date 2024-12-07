<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Offer;
use App\Models\Company;
use App\Models\Home;
use App\Models\User;
use App\Models\Promotion;
use App\Models\Application;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function studentindex()
    {
        $companies = Company::all();
        $offers = Offer::all();
        $feedbacks = Feedback::all();
        $users = User::all();
        $promotion = Promotion::all();

        // <p>Mes Infos</p>
        //             <p>Ma classe</p>
        //             <p>Mon pilote</p>
        //             <p>Mes candidature</p>

        return view('profile.student.dashboard', compact('companies', 'offers', 'feedbacks', 'users', 'promotion'));
    }

    public function piloteindex()
    {
        $companies = Company::all();
        $offers = Offer::all();
        $feedbacks = Feedback::all();
        $users = User::all();
        $promotion = Promotion::all();

        // <p>Mes Infos</p>
        // <p>Mes promo</p>
        // <p>mes eleves</p>

        return view('profile.pilote.dashboard', compact('companies', 'offers', 'feedbacks', 'users', 'promotion'));
    }

    public function companyindex()
    {
        $companies = Company::all();
        $offers = Offer::all();
        
        $users = User::all();
        $promotion = Promotion::all();
        $application  = Application::all();

        // <p>Mes Infos</p>
        // <p>Mes offres</p>
        // <p>les applications</p>

        return view('profile.company.dashboard', compact('companies', 'offers', 'users', 'promotion','application'));
    }

    public function adminindex()
    {
        $companies = Company::all();
        $offers = Offer::all();
        $users = User::all();
        $promotion = Promotion::all();
        $application  = Application::all();

       // revoir ce qu'il faut 

        return view('profile.admin.dashboard', compact('companies', 'offers', 'users', 'promotion','application'));
    }
}
