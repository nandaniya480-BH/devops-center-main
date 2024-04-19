<?php

namespace App\Http\Controllers;

use App\Models\Impressum;
use Illuminate\Http\Request;

class ImpressumController extends Controller
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
        return view('pages.impressum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Impressum;

        $item->content = $request->content;

        $item->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Impressum  $impressum
     * @return \Illuminate\Http\Response
     */
    public function show(Impressum $impressum)
    {
        $impressumPagesCount = Impressum::first();

        return view('pages.info.default')->with('item', $impressumPagesCount);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Impressum  $impressum
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Impressum::find($id);

        return view('pages.impressum.edit')->with('item',$item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Impressum  $impressum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $item = Impressum::find($request->id);

        $item->content = $request->content;

        $item->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Impressum  $impressum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Impressum $impressum)
    {
        //
    }
}
