<?php

namespace App\Http\Controllers;

use App\Riego;
use Illuminate\Http\Request;

class RiegoController extends Controller
{

public function __construct()
    {
      
        $this->middleware('can:riego.index')->only('index');
        $this->middleware('can:riego.create')->only(['create','store']);
        $this->middleware('can:riego.show')->only('show');
        $this->middleware('can:riego.edit')->only(['edit','update']);
        $this->middleware('can:riego.destroy')->only('destroy');
    }




    public function index(Request $request)
    {
        $riegos = Riego::paginate(15);
        return view('riego.index', compact ('riegos'));
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
     * @param  \App\Riego  $riego
     * @return \Illuminate\Http\Response
     */
    public function show(Riego $riego)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Riego  $riego
     * @return \Illuminate\Http\Response
     */
    public function edit(Riego $riego)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Riego  $riego
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Riego $riego)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Riego  $riego
     * @return \Illuminate\Http\Response
     */
    public function destroy(Riego $riego)
    {
        //
    }
}
