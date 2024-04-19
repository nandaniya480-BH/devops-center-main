<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as HomeController;
use App\Http\Controllers\JobsController as JobsController;
use App\Http\Controllers\ProfilePodsController as ProfilePodsController;
use App\Http\Controllers\AgbController as AgbController;
use App\Http\Controllers\CookiePolicyController as CookiePolicyController;
use App\Http\Controllers\ImpressumController as ImpressumController;
use App\Http\Controllers\TagController as TagController;
use App\Http\Controllers\LanguageController as LanguageController;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use App\Models\ProfilePods;
use App\Models\Tag;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');

// Career routes for user
Route::get('/career/jobs/list', [JobsController::class, 'showJobList'])->name('career_job_list');
Route::get('/career/jobs/{slug}', [JobsController::class, 'showJobItem'])->name('career_item');

Route::get('/career/topics/jobs/{topic}', [JobsController::class, 'showJobListTopic'])->name('career_job_list_topics');

// News routes for user
Route::any('/profile-list', [ProfilePodsController::class, 'showProfileList'])->name('profile_list');
Route::get('/profile/item/{slug}', [ProfilePodsController::class, 'showProfileItem'])->name('profile_item');
Route::get('/profile/topics/{topic}', [ProfilePodsController::class, 'showProfileListTopic'])->name('profile_list_topics');

// About us Page
Route::get('/about-us', function () {
    $jsonString = file_get_contents(resource_path()."/lang/tech.json");
    $data = json_decode($jsonString, true);
    $tags = Tag::all();
    return view('pages.about-us.default')->with('data', $data)->with('tags', $tags);
});
// Services Page
Route::get('/services', function () {
    $jsonString = file_get_contents(resource_path()."/lang/tech.json");
    $data = json_decode($jsonString, true);
    $tags = Tag::all();
    return view('pages.services.default')->with('data', $data)->with('tags', $tags);
});

Route::post('/contact-us', function (Request $request) {

    $profile_number = \Crypt::decryptString($request->profile_number) ;

    $profile = ProfilePods::where('item_profile_number', $profile_number)->first() ?? [];

    $name = $request->name;
    $email = $request->email;
    $emailMessage = $request->email_message;

    \Mail::to('info@devops-center.ch')->send(new ContactUs($profile, $name, $email, $request->subject, $emailMessage));

    return View::make('blocks.mail.response');
})->name('contact.us');

// Admin Send Mail
Route::post('/admin/mail/send', function (Request $request) {
    
    $profile = [];
    $template_email = '';
    $name = '';

    $email = $request->email;
    $emailMessage = $request->email_message;

    \Mail::to($email)->send(new ContactUs($profile, $name, $template_email, $request->subject, $emailMessage));

    return View::make('blocks.mail.response_admin');
})->name('admin.mail.send');


// Language switcher
Route::group(['middleware'=>'language'],function ()
{
    Route::get('/change-language/{locale}', function ($locale) {
        if (!in_array($locale, ['en', 'de'])) {        
            abort(404);
        }
        // Session
        \Session::put('locale',$locale);
    
        return redirect()->back();
    });
});

Route::get('/agb', [AgbController::class, 'show'])->name('agb.show');
Route::get('/impressum', [ImpressumController::class, 'show'])->name('impressum.show');
Route::get('/cookie-policy', [CookiePolicyController::class, 'show'])->name('cookie-policy.show');

Route::post('/check-language-json', [HomeController::class, 'checkIfJsonValid']);

// Disable the register route since we won't be needing it
Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', [HomeController::class, 'admin'])->name('admin');
    Route::get('/logout', [HomeController::class, 'logout']);
    

    // Jobs routes 
    Route::get('/jobs/show', [JobsController::class, 'show'])->name('jobs.show');
    Route::get('/jobs/create', [JobsController::class, 'create'])->name('jobs.create');
    Route::post('/jobs/store', [JobsController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/edit/{id}', [JobsController::class, 'edit'])->name('jobs.edit');
    Route::post('/jobs/update', [JobsController::class, 'update'])->name('jobs.update');
    Route::get('/jobs/destroy/{id}', [JobsController::class, 'destroy'])->name('jobs.destroy');

    // Profile routes 
    Route::get('/profile/show', [ProfilePodsController::class, 'show'])->name('profile.show');
    Route::get('/profile/create', [ProfilePodsController::class, 'create'])->name('profile.create');
    Route::post('/profile/store', [ProfilePodsController::class, 'store'])->name('profile.store');
    Route::get('/profile/edit/{id}', [ProfilePodsController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfilePodsController::class, 'update'])->name('profile.update');
    Route::get('/profile/destroy/{id}', [ProfilePodsController::class, 'destroy'])->name('profile.destroy');

    // Tags routes 
    Route::get('/tags/show', [TagController::class, 'show'])->name('tags.show');
    Route::post('/tags/store', [TagController::class, 'store'])->name('tags.store');
    Route::post('/tags/update', [TagController::class, 'update'])->name('tags.update');
    Route::get('/tags/destroy/{id}', [TagController::class, 'destroy'])->name('tags.destroy');

    Route::get('/language/show', [LanguageController::class, 'show'])->name('language.show');
    Route::post('/language/store', [LanguageController::class, 'store'])->name('language.store');
    Route::post('/language/update', [LanguageController::class, 'update'])->name('language.update');
    Route::get('/language/destroy/{id}', [LanguageController::class, 'destroy'])->name('language.destroy');


    // Change Site language Strings
    Route::get('/get-language-json/{lang}', [HomeController::class, 'getLanguageJson']);
    Route::post('/save-language-json', [HomeController::class, 'saveLanguageJson'])->name('language.save');


    // AGB routes 
    Route::get('/agb/create', [AgbController::class, 'create'])->name('agb.create');
    Route::post('/agb/store', [AgbController::class, 'store'])->name('agb.store');
    Route::get('/agb/edit/{id}', [AgbController::class, 'edit'])->name('agb.edit');
    Route::post('/agb/update', [AgbController::class, 'update'])->name('agb.update');
    Route::get('/agb/destroy/{id}', [AgbController::class, 'destroy'])->name('agb.destroy');

    // AGB routes 
    Route::get('/impressum/create', [ImpressumController::class, 'create'])->name('impressum.create');
    Route::post('/impressum/store', [ImpressumController::class, 'store'])->name('impressum.store');
    Route::get('/impressum/edit/{id}', [ImpressumController::class, 'edit'])->name('impressum.edit');
    Route::post('/impressum/update', [ImpressumController::class, 'update'])->name('impressum.update');

    // AGB routes 
    Route::get('/cookie-policy/create', [CookiePolicyController::class, 'create'])->name('cookie-policy.create');
    Route::post('/cookie-policy/store', [CookiePolicyController::class, 'store'])->name('cookie-policy.store');
    Route::get('/cookie-policy/edit/{id}', [CookiePolicyController::class, 'edit'])->name('cookie-policy.edit');
    Route::post('/cookie-policy/update', [CookiePolicyController::class, 'update'])->name('cookie-policy.update');

    // Send E-mail
    Route::get('/admin/mail', function () {
        return view('pages.mail.send');
    });
});