<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


//version 8 : 28/03 00h10


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// page statics
Route::get('/Home', function () {
    return view('Home.Home');
});

Route::get('/Blog', function () {
    return view('Home.Blog');
});

Route::get('/FAQ', function () {
    return view('Home.Faq');
});

Route::get('/Apropos', function () {
    return view('Home.about');
});

Route::get('/Service', function () {
    return view('Home.service');
});

Route::get('/Support', function () {
    return view('Home.support');
});

Route::get('/Contact', function () {
    return view('Home.contact');
});
Route::get('/Mention', function () {
    return view('Home.Mentionlegal');
});







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// 
// 
// 

use App\Http\Controllers\AdvancementController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EstablishmentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LocalisationController;
use App\Http\Controllers\LocalisationHasCompanyController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\WishlistHasOfferController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\HomeController;

//home et gestion principal
Route::get('/FAQ',[FAQController::class, 'index'])->name('FAQ.index)');
Route::get('/Home',[HomeController::class, 'index'])->name('Home.Home)');
Route::get('/',[HomeController::class, 'index'])->name('Home.Home)');
// Route::get('/Homes',[HomeController::class, 'index'])->name('Home.Homes)');


Route::post('/wishlists/addToWishlist/{offerId}', [WishlistController::class, 'addToWishlist'])->name('wishlist.addToWishlist');
Route::delete('/wishlist/{offerId}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.removeFromWishlist');

//dashboard route
Route::get('/student/dashboard',[DashboardController::class, 'studentindex'])->name('Dashboard.student)');
Route::get('/pilote/dashboard',[DashboardController::class, 'piloteindex'])->name('Dashboard.pilote)');
Route::get('/company/dashboard',[DashboardController::class, 'companyindex'])->name('Dashboard.company)');
Route::get('/admin/dashboard',[DashboardController::class, 'adminindex'])->name('Dashboard.admin)');


// Advancement
Route::get('/Advancements', [AdvancementController::class, 'index'])->name('Advancements.index');
Route::get('/Advancements/create', [AdvancementController::class, 'create'])->name('Advancements.create');
Route::post('/Advancements/store', [AdvancementController::class, 'store'])->name('Advancements.store');
Route::get('/Advancements/{id}', [AdvancementController::class, 'show'])->name('Advancements.show');
Route::get('/Advancements/{id}/edit', [AdvancementController::class, 'edit'])->name('Advancements.edit');
Route::post('/Advancements/{id}', [AdvancementController::class, 'update'])->name('Advancements.update');
Route::delete('/Advancements/{id}', [AdvancementController::class, 'destroy'])->name('Advancements.destroy');

// Route pour accès Applications Values
Route::get('/Applications', [ApplicationController::class, 'index'])->name('Applications.index');
Route::get('/Applications/create', [ApplicationController::class, 'create'])->name('Applications.create');
Route::post('/Applications/store', [ApplicationController::class, 'store'])->name('Applications.store');
Route::get('/Applications/{id}', [ApplicationController::class, 'show'])->name('Applications.show');
Route::get('/Applications/{id}/edit', [ApplicationController::class, 'edit'])->name('Applications.edit');
Route::post('/Applications/{id}', [ApplicationController::class, 'update'])->name('Applications.update');
Route::delete('/Applications/{id}', [ApplicationController::class, 'destroy'])->name('Applications.destroy');

//revoir la route pour creer une new view .  


// Route pour accès Companies Values
Route::get('/Companies', [CompanyController::class, 'index'])->name('Companies.index');
// Route::get('/Companies/test', [CompanyController::class, 'index2'])->name('Companies.index2');
Route::get('/Companies/create', [CompanyController::class, 'create'])->name('Companies.create');
Route::post('/Companies/store', [CompanyController::class, 'store'])->name('Companies.store');
Route::get('/Companies/{id}', [CompanyController::class, 'show'])->name('Companies.show');
Route::get('/Companies/{id}/edit', [CompanyController::class, 'edit'])->name('Companies.edit');
Route::post('/Companies/{id}', [CompanyController::class, 'update'])->name('Companies.update');
Route::delete('/Companies/{id}', [CompanyController::class, 'destroy'])->name('Companies.destroy');
Route::post('/Companies/search/results', [CompanyController::class, 'search'])->name('Companies.search');


// Route pour accès Establishments Values
Route::get('/Establishments', [EstablishmentController::class, 'index'])->name('Establishments.index');
// Route::get('/Establishments', [EstablishmentController::class, 'index']);
Route::get('/Establishments/create', [EstablishmentController::class, 'create'])->name('Establishments.create');
Route::post('/Establishments/store', [EstablishmentController::class, 'store'])->name('Establishments.store');
Route::get('/Establishments/{id}', [EstablishmentController::class, 'show'])->name('Establishments.show');
Route::get('/Establishments/{id}/edit', [EstablishmentController::class, 'edit'])->name('Establishments.edit');
Route::post('/Establishments/{id}', [EstablishmentController::class, 'update'])->name('Establishments.update');
Route::delete('/Establishments/{id}', [EstablishmentController::class, 'destroy'])->name('Establishments.destroy');

// Route pour accès Feedbacks Values
Route::get('/Feedbacks', [FeedbackController::class, 'index'])->name('Feedbacks.index');
// Route::get('/Feedbacks', [FeedbackController::class, 'index']);
Route::get('/Feedbacks/create', [FeedbackController::class, 'create'])->name('Feedbacks.create');
Route::post('/Feedbacks/store', [FeedbackController::class, 'store'])->name('Feedbacks.store');
Route::get('/Feedbacks/{id}', [FeedbackController::class, 'show'])->name('Feedbacks.show');
Route::get('/Feedbacks/{id}/edit', [FeedbackController::class, 'edit'])->name('Feedbacks.edit');
Route::post('/Feedbacks/{id}', [FeedbackController::class, 'update'])->name('Feedbacks.update');
Route::delete('/Feedbacks/{id}', [FeedbackController::class, 'destroy'])->name('Feedbacks.destroy');

// Route pour accès Localisations Values
Route::get('/Localisations', [LocalisationController::class, 'index'])->name('Localisations.index');
// Route::get('/Localisations', [LocalisationController::class, 'index']);
Route::get('/Localisations/create', [LocalisationController::class, 'create'])->name('Localisations.create');
Route::post('/Localisations/store', [LocalisationController::class, 'store'])->name('Localisations.store');
Route::get('/Localisations/{id}', [LocalisationController::class, 'show'])->name('Localisations.show');
Route::get('/Localisations/{id}/edit', [LocalisationController::class, 'edit'])->name('Localisations.edit');
Route::post('/Localisations/{id}', [LocalisationController::class, 'update'])->name('Localisations.update');
Route::delete('/Localisations/{id}', [LocalisationController::class, 'destroy'])->name('Localisations.destroy');

// Route pour accès Localisations_has_Companies Values
Route::get('/Localisations-has-companies', [LocalisationHasCompanyController::class, 'index'])->name('LocalisationsHasCompanies.index');
// Route::get('/Localisations', [LocalisationsController::class, 'index']);
Route::get('/Localisations-has-companies/create', [LocalisationHasCompanyController::class, 'create'])->name('LocalisationsHasCompanies.create');
Route::post('/Localisations-has-companies/store', [LocalisationHasCompanyController::class, 'store'])->name('LocalisationsHasCompanies.store');
Route::get('/Localisations-has-companies/{id}', [LocalisationHasCompanyController::class, 'show'])->name('LocalisationsHasCompanies.show');
Route::get('/Localisations-has-companies/{id}/edit', [LocalisationHasCompanyController::class, 'edit'])->name('LocalisationsHasCompanies.edit');
Route::post('/Localisations-has-companies/{id}', [LocalisationHasCompanyController::class, 'update'])->name('LocalisationsHasCompanies.update');
Route::delete('/Localisations-has-companies/{id}', [LocalisationHasCompanyController::class, 'destroy'])->name('LocalisationsHasCompanies.destroy');

// Route pour accès Offers Values
Route::get('/Offers', [OfferController::class, 'index'])->name('Offers.index');
// Route::get('/Offers', [OfferController::class, 'index']);
Route::get('/Offers/create', [OfferController::class, 'create'])->name('Offers.create');
Route::post('/Offers/store', [OfferController::class, 'store'])->name('Offers.store');
Route::get('/Offers/{id}', [OfferController::class, 'show'])->name('Offers.show');
Route::get('/Offers/{id}/edit', [OfferController::class, 'edit'])->name('Offers.edit');
Route::post('/Offers/{id}', [OfferController::class, 'update'])->name('Offers.update');
Route::delete('/Offers/{id}', [OfferController::class, 'destroy'])->name('Offers.destroy');

Route::post('/Offers/search/results', [OfferController::class, 'search'])->name('Offers.search');



// Route pour accès Promotions Values
Route::get('/Promotions', [PromotionController::class, 'index'])->name('Promotions.index');
// Route::get('/Promotions', [PromotionController::class, 'index']);
Route::get('/Promotions/create', [PromotionController::class, 'create'])->name('Promotions.create');
Route::post('/Promotions/store', [PromotionController::class, 'store'])->name('Promotions.store');
Route::get('/Promotions/{id}', [PromotionController::class, 'show'])->name('Promotions.show');
Route::get('/Promotions/{id}/edit', [PromotionController::class, 'edit'])->name('Promotions.edit');
Route::post('/Promotions/{id}', [PromotionController::class, 'update'])->name('Promotions.update');
Route::delete('/Promotions/{id}', [PromotionController::class, 'destroy'])->name('Promotions.destroy');

// Route pour accès Roles Values
Route::get('/Roles', [RoleController::class, 'index'])->name('Roles.index');
// Route::get('/Roles', [RoleController::class, 'index']);
Route::get('/Roles/create', [RoleController::class, 'create'])->name('Roles.create');
Route::post('/Roles/store', [RoleController::class, 'store'])->name('Roles.store');
Route::get('/Roles/{id}', [RoleController::class, 'show'])->name('Roles.show');
Route::get('/Roles/{id}/edit', [RoleController::class, 'edit'])->name('Roles.edit');
Route::post('/Roles/{id}', [RoleController::class, 'update'])->name('Roles.update');
Route::delete('/Roles/{id}', [RoleController::class, 'destroy'])->name('Roles.destroy');

// Route pour accès Users Values
Route::get('/Users', [UserController::class, 'index'])->name('Users.index');
Route::get('/Users/create', [UserController::class, 'create'])->name('Users.create');
Route::post('/Users/store', [UserController::class, 'store'])->name('Users.store');
Route::get('/Users/{id}', [UserController::class, 'show'])->name('Users.show');
Route::get('/Users/{id}/edit', [UserController::class, 'edit'])->name('Users.edit');
Route::post('/Users/{id}', [UserController::class, 'update'])->name('Users.update');
Route::delete('/Users/{id}', [UserController::class, 'destroy'])->name('Users.destroy');

Route::post('/Users/search/results', [UserController::class, 'search'])->name('Users.search');


// Route pour accès Wishlists Values
Route::get('/Wishlists', [WishlistController::class, 'index'])->name('Wishlists.index');
// Route::get('/Wishlists', [WishlistController::class, 'index']);
Route::get('/Wishlists/create', [WishlistController::class, 'create'])->name('Wishlists.create');
Route::post('/Wishlists/store', [WishlistController::class, 'store'])->name('Wishlists.store');
Route::get('/Wishlists/{id}', [WishlistController::class, 'show'])->name('Wishlists.show');
Route::get('/Wishlists/{id}/edit', [WishlistController::class, 'edit'])->name('Wishlists.edit');
Route::post('/Wishlists/{id}', [WishlistController::class, 'update'])->name('Wishlists.update');
Route::delete('/Wishlists/{id}', [WishlistController::class, 'destroy'])->name('Wishlists.destroy');

// Route pour accès Wishlists_has_Offers Values
Route::get('/Wishlists-has-offers', [WishlistHasOfferController::class, 'index'])->name('WishlistsHasoffers.index');
// Route::get('/Wishlist-has-offers', [WishlistController::class, 'index']);
Route::get('/Wishlists-has-offers/create', [WishlistController::class, 'create'])->name('WishlistsHasOffers.create');
Route::post('/Wishlists-has-offers/store', [WishlistController::class, 'store'])->name('WishlistsHasOffers.store');
Route::get('/Wishlists-has-offers/{id}', [WishlistController::class, 'show'])->name('WishlistsHasOffers.show');
Route::get('/Wishlists-has-offers/{id}/edit', [WishlistController::class, 'edit'])->name('WishlistsHasOffers.edit');
Route::post('/Wishlists-has-offers/{id}', [WishlistController::class, 'update'])->name('WishlistsHasOffers.update');
Route::delete('/Wishlists-has-offers/{id}', [WishlistController::class, 'destroy'])->name('WishlistsHasOffers.destroy');