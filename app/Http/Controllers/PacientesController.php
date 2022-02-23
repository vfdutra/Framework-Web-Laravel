<?php

namespace App\Http\Controllers;

use App\Models\Medicos;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Pacientes::all();
        return view('pacientes/index', \compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes/create');
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
            'nome'     => 'required|min:5|max:100',
            'cpf'      => 'required|min:11|max:14',
            'email'    => 'required',
            'telefone' => 'required',
            'endereco' => 'required|max:10',
            'idade'    => 'required|min:2'
        ];

        $msgs = [
            'required' => 'O preenchimento do campo :attribute é obrigatório',
            'max'      => 'O campo :attribute possui tamanho máximo de :max caracteres',
            'min'      => 'O campo :attribute possui tamanho mínimo de :min caracteres'
        ];

        $request->validate($regras, $msgs);
        Pacientes::create($request->all());
        return \redirect('pacientes')->with('sucess', 'Paciente cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function show(Pacientes $pacientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pacientes = Pacientes::find($id);
        return view('pacientes/edit', compact('pacientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $regras = [
            'nome'     => 'required|min:5|max:100',
            'cpf'      => 'required|min:11|max:14',
            'telefone' => 'required',
            'endereco' => 'required|max:10',
            'idade'    => 'required|min:2'
        ];

        $msgs = [
            'required' => 'O preenchimento do campo :attribute é obrigatório',
            'max' => 'O campo :attribute possui tamanho máximo de :max caracteres',
            'min' => 'O campo :attribute possui tamanho mínimo de :min caracteres'
        ];

        $request->validate($regras, $msgs);

        $pacientes = Pacientes::find($id);
        $pacientes->update($request->all());
        return \redirect(("pacientes"))->with('sucess', 'Paciente alterado com sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pacientes = Pacientes::find($id);
        $pacientes->delete();
        return \redirect('pacientes');
    }

    public function listaPacientesConsultas(Request $request)
    {
        $medicos = Medicos::all();
        $pacientes = Pacientes::all();
        $pacienteEscolhido = Pacientes::find($request->id);
        if (isset($pacienteEscolhido->consulta_pacientes)) {
            $consulta_pacientes = $pacienteEscolhido->consulta_pacientes;
        } else {
            $consulta_pacientes = null;
        }
        return view('relatorios/listaPacientesConsultas', \compact('pacientes', 'pacienteEscolhido', 'consulta_pacientes', 'medicos'));
    }
}