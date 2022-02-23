<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Medicos;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consulta = Consulta::all();
        return view('consulta/index', \compact('consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medicos::all();
        $pacientes = Pacientes::all();
        return view('consulta/create', \compact('pacientes', 'medicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'dt_consulta' => 'required',
            'hr_consulta' => 'required',
            'convenio'    => 'required|min:2',
            'valor'       => 'required|min:2',
            'medicos_id'   => 'required',
            'pacientes_id' => 'required'
        ];

        $msgs = [
            'required' => 'O preenchimento do campo :attribute é obrigatório',
            'max' => 'O campo :attribute possui tamanho máximo de :max caracteres',
            'min' => 'O campo :attribute possui tamanho mínimo de :min caracteres'
        ];

        $request->validate($regras, $msgs);

        Consulta::create($request->all());
        return \redirect('consulta')->with('sucess', 'Consulta cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show(Consulta $consulta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicos = Medicos::all();
        $pacientes = Pacientes::all();
        $consulta = Consulta::find($id);
        return view('consulta/edit', compact('consulta', 'medicos', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $regras = [
            'dt_consulta' => 'required',
            'hr_consulta' => 'required',
            'convenio'    => 'required|min:2',
            'valor'       => 'required|min:2',
            'medicos_id'   => 'required',
            'pacientes_id' => 'required'
        ];

        $msgs = [
            'required' => 'O preenchimento do campo :attribute é obrigatório',
            'max' => 'O campo :attribute possui tamanho máximo de :max caracteres',
            'min' => 'O campo :attribute possui tamanho mínimo de :min caracteres'
        ];

        $request->validate($regras, $msgs);

        $consulta = Consulta::find($id);
        $consulta->update($request->all());
        return \redirect(("consulta"))->with('sucess', 'Consulta editada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consulta = Consulta::find($id);
        $consulta->delete();
        return \redirect('consulta');
    }
}