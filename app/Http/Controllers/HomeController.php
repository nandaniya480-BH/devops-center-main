<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\ProfilePods;
use App\Models\Agb;
use App\Models\Tag;
use App\Models\CookiePolicy;
use App\Models\Impressum;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = Jobs::where('item_is_active', 1)->latest()->paginate(3);
        $profile = ProfilePods::all()->where('item_is_active', 1);
        return view('pages/homepage/default')->with('jobs', $jobs)->with('profile', $profile)->with('profile_list_title', 'Profile pods');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {
        $impressumPagesCount = Impressum::first();
        $cookiePolicyPagesCount = CookiePolicy::first();

        return view('pages/admin/dashboard')->with('impressum', $impressumPagesCount)->with('cookie', $cookiePolicyPagesCount);
    }

    /**
     * Logout user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Logout()
    {
        \Auth::logout();
        return redirect('/');
    }

    public function languageHandler($request, Closure $next)
    {
        if(session()->has('locale'))
            app()->setLocale(session('locale'));
        else 
            app()->setLocale(config('app.locale'));

        return $next($request);
    }

    public function getLanguageJson($lang)
    {
        $jsonString = file_get_contents(resource_path()."/lang/".$lang.".json");
        $data = json_decode($jsonString, true);

        return view('pages.language.default')->with('jsonString', $jsonString)->with('lang', $lang);
    }

    public function checkIfJsonValid(Request $request)
    {
        json_decode($request->json);
        if(json_last_error() === JSON_ERROR_NONE){
            return true;
        } else {
            return false;
        }
    }

    public function saveLanguageJson(Request $request)
    {
        // if(json_last_error() === JSON_ERROR_NONE){
        //     return ;
        // } else {
        //     return false;
        // }

        $json = json_decode($request->json);
        $lang = $request->lang;
        file_put_contents(resource_path()."/lang/".$lang.".json", json_encode($json, JSON_PRETTY_PRINT));

        return redirect('/get-language-json/'.$lang);
    }

    public function sendMail(Request $request)
    {
        json_decode($request->json);
        if(json_last_error() === JSON_ERROR_NONE){
            return true;
        } else {
            return false;
        }
    }
}
