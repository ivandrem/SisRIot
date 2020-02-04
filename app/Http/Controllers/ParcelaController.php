<?php

namespace App\Http\Controllers;

use App\Parcela;
use Illuminate\Http\Request;

class ParcelaController extends Controller
{

  public function __construct()
    {
      
        $this->middleware('can:parcelas.index')->only('index');
        $this->middleware('can:parcelas.create')->only(['create','store']);
        $this->middleware('can:parcelas.show')->only('show');
        $this->middleware('can:parcelas.edit')->only(['edit','update']);
        $this->middleware('can:parcelas.destroy')->only('destroy');
    }




    public function index(Request $request)
    {
        $parcelas = Parcela::paginate(15);;

        return view('parcelas.index', compact('parcelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parcelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Parcela = new Parcela;
        $Parcela->fill($request->only('numero', 'variedad', 'tipo', 'enabled', 'name','estado'));
        
        $Parcela->save();

        session()->flash('message', '¡Parcela registrada con éxito!');
        return redirect()->route('parcelas.index', compact('Parcela'));
    }

    public function show(Parcela $parcela)
    {
        return view('parcelas.show', compact('parcela'));
    }

    public function edit(Parcela $parcela)
    {
        return view('parcelas.edit', compact('parcela'));
    }

    public function update(Request $request, Parcela $parcela)
    {
        $parcela->fill($request->only('tipo', 'variedad', 'enabled','name'));
        $parcela->save();

        session()->flash('message', '¡Parcela actualizada con éxito!');
        return redirect()->route('parcelas.index', compact('parcela'));
    }

    public function destroy(Request $request, Parcela $parcela)
    {
        $parcela->delete();
        session()->flash('message', '¡Parcela eliminada con éxito!');
        return redirect()->route('parcelas.index');
    }
}
