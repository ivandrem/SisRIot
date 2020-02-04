<?php

namespace App\Http\Controllers;

use App\Plantas;
use Illuminate\Http\Request;

class PlantasController extends Controller
{
   
public function __construct()
    {
      
        $this->middleware('can:plantas.index')->only('index');
        $this->middleware('can:plantas.create')->only(['create','store']);
        $this->middleware('can:plantas.show')->only('show');
        $this->middleware('can:plantas.edit')->only(['edit','update']);
        $this->middleware('can:plantas.destroy')->only('destroy');
    }



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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plantas  $plantas
     * @return \Illuminate\Http\Response
     */
    public function show(Plantas $plantas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plantas  $plantas
     * @return \Illuminate\Http\Response
     */
    public function edit(Plantas $plantas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plantas  $plantas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plantas $plantas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plantas  $plantas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plantas $plantas)
    {
        //
    }
}
