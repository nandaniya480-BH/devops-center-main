<?php

namespace App\Http\Controllers;

use App\Models\CookiePolicy;
use Illuminate\Http\Request;

class CookiePolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.cookie-policy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new CookiePolicy;

        $item->content = $request->content;

        $item->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CookiePolicy  $cookiePolicy
     * @return \Illuminate\Http\Response
     */
    public function show(CookiePolicy $cookiePolicy)
    {
        $cookiePolicyPagesCount = CookiePolicy::first();

        return view('pages.info.default')->with('item', $cookiePolicyPagesCount);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CookiePolicy  $cookiePolicy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = CookiePolicy::find($id);

        return view('pages.cookie-policy.edit')->with('item',$item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CookiePolicy  $cookiePolicy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $item = CookiePolicy::find($request->id);

        $item->content = $request->content;

        $item->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CookiePolicy  $cookiePolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy(CookiePolicy $cookiePolicy)
    {
        //
    }
}
