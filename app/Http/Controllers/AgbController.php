<?php

namespace App\Http\Controllers;

use App\Models\Agb;
use Illuminate\Http\Request;

class AgbController extends Controller
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
        return view('pages.agb.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Agb;

        $item->content = $request->content;

        $item->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agb  $agb
     * @return \Illuminate\Http\Response
     */
    public function show(Agb $agb)
    {
        $agbPagesCount = Agb::first();

        return view('pages.info.default')->with('item', $agbPagesCount);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agb  $agb
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Agb::find($id);

        return view('pages.agb.edit')->with('item',$item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agb  $agb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $item = Agb::find($request->id);

        $item->content = $request->content;

        $item->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agb  $agb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agb $agb)
    {
        //
    }
}
