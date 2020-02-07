<?php

namespace App\Http\Controllers;

use App\Riego;
use Illuminate\Http\Request;

class RiegosController extends Controller
{

public function __construct()
    {
      
        $this->middleware('can:riegos.index')->only('index');
        $this->middleware('can:riegos.create')->only(['create','store']);
        $this->middleware('can:riegos.show')->only('show');
        $this->middleware('can:riegos.edit')->only(['edit','update']);
        $this->middleware('can:riegos.destroy')->only('destroy');
    }

 public function create()
    {
        return view('riegos.create');
    }



       public function index(Request $request)
    {
        $riegos = Riego::paginate(15);;

        return view('riegos.index', compact('riegos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //**protected $fillable = ['nombre', 'tipo', 'descripcion', 'intervalo', 'tiempo','estado'];
        $Riego = new Riego;
        $Riego->fill($request->only('nombre', 'tipo', 'descripcion', 'intervalo', 'tiempo','estado'));
        
        $Riego->save();

        session()->flash('message', '¡ Riego registrada con éxito!');
        return redirect()->route('riegos.index', compact('Riego'));
    }
  

    public function show(Riego $riego)
    {
        return view('riegos.show', compact('riego'));
    }

    public function edit(Riego $riego)
    {
        return view('riegos.edit', compact('riego'));
    }

    public function update(Request $request, Riego $riego)
    {
        $riego->fill($request->only('nombre', 'tipo', 'descripcion', 'intervalo', 'tiempo','estado'));
        $riego->save();

        session()->flash('message', 'Riego actualizado con éxito!');
        return redirect()->route('riegos.index', compact('riego'));
    }

    public function destroy(Request $request, Riego $riego)
    {
        $riego->delete();
        session()->flash('message', 'Riego eliminado con éxito!');
        return redirect()->route('riegos.index');
    }
}