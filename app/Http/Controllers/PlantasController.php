<?php

namespace App\Http\Controllers;

use App\Planta;
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


    public function index(Request $request)
    {
        $plantas = Planta::paginate(15);;

        return view('plantas.index', compact('plantas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plantas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //**['variedad','Descripcion','total','estado','observaciones'];
        $Planta = new Planta;
        $Planta->fill($request->only('variedad', 'Descripcion', 'total', 'estado', 'observaciones'));
        
        $Planta->save();

        session()->flash('message', '¡Planta registrada con éxito!');
        return redirect()->route('plantas.index', compact('Planta'));
    }

    public function show(Planta $planta)
    {
        return view('plantas.show', compact('planta'));
    }

    public function edit(Planta $planta)
    {
        return view('plantas.edit', compact('planta'));
    }

    public function update(Request $request, Planta $planta)
    {
        $planta->fill($request->only('variedad', 'Descripcion', 'total', 'estado', 'observaciones'));
        $planta->save();

        session()->flash('message', '¡Planta actualizada con éxito!');
        return redirect()->route('plantas.index', compact('planta'));
    }

    public function destroy(Request $request, Planta $planta)
    {
        $planta->delete();
        session()->flash('message', '¡Planta eliminada con éxito!');
        return redirect()->route('plantas.index');
    }
}
