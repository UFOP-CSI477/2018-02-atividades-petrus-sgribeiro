<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Equipamento;

class ControladorEquipamento extends Controller
{
    public function index(){

        $eqps = Equipamento::all();
    	return view('equipamentos', compact('eqps'));
    	
    }

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novoequipamento');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //Validação

        $regras = [
            'nomeEquipamento' => 'required | max:50'
        ];

        $mensagens = [
            'nomeEquipamento.required' => 'O campo Nome é requerido',
            'nomeEquipamento.max' => 'Limite de caracteres: 50'
        ];

        $request->validate($regras, $mensagens);


        //Gravar
        $eqp = new Equipamento();
        $eqp->nome = $request->input('nomeEquipamento');
        $eqp->save();
        //return view('equipamentos', ['eqp' => $eqp]);
        return redirect('/equipamentos');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$id
        //$estado = estado::find($id)
        //return view('estdaos.view')->with('estado', $estado)
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function edit($id)
    public function edit(Equipamento $eqp)
    {
        $eqp = Equipamento::find($id);
        if(isset($eqp)){
            return view('editarequipamento', compact($eqp));
            //return view('editarequipamento')->with('Equipamento', $eqp);

        }
        return redirect('/equipamentos');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $eqp = Equipamento::find($id);
        if(isset($eqp)){

            $eqp->nome = $request->input('nomeCategoria');
            $eqp->save();

        }
        return redirect('/equipamentos');
        //$estado->fill(request->all());
        //estado->save();
        //return redirect()->route('estados.show'), $estado->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eqp = Equipamento::find($id);
        if (isset($eqp)){
            $eqp->delete();
        }
        return redirect ('/equipamentos');
    }


}
