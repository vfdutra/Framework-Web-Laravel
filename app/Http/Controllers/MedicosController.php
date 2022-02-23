<?php

namespace App\Http\Controllers;

use App\Models\Medicos;
use App\Models\Pacientes;
use App\Models\Consulta;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medicos::all();
        return view('medicos/index', \compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicos/create');
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
            'nome'          => 'required|min:5|max:100',
            'cpf'           => 'required|min:11|max:14',
            'email'         => 'required',
            'telefone'      => 'required|max:10',
            'crm'           => 'required',
            'especialidade' => 'required|min:2'
        ];

        $msgs = [
            'required' => 'O preenchimento do campo :attribute é obrigatório',
            'max'      => 'O campo :attribute possui tamanho máximo de :max caracteres',
            'min'      => 'O campo :attribute possui tamanho mínimo de :min caracteres'
        ];

        $request->validate($regras, $msgs);

        Medicos::create($request->all());
        return \redirect('medicos')->with('sucess', 'Médico cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function show(Medicos $medicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicos = Medicos::find($id);
        return view('medicos/edit', compact('medicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $regras = [
            'nome'          => 'required|min:5|max:100',
            'cpf'           => 'required|min:11|max:14',
            'email'         => 'required',
            'telefone'      => 'required|max:10',
            'crm'           => 'required',
            'especialidade' => 'required|min:2'
        ];

        $msgs = [
            'required' => 'O preenchimento do campo :attribute é obrigatório',
            'max'      => 'O campo :attribute possui tamanho máximo de :max caracteres',
            'min'      => 'O campo :attribute possui tamanho mínimo de :min caracteres'
        ];

        $request->validate($regras, $msgs);

        $medicos = Medicos::find($id);
        $medicos->update($request->all());
        return \redirect(("medicos"))->with('sucess', 'Médico alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicos = Medicos::find($id);
        $medicos->delete();
        return \redirect('medicos');
    }

    public function listaMedicosConsultas(Request $request)
    {
        $pacientes = Pacientes::all();
        $medicos = Medicos::all();
        $medicoEscolhido = Medicos::find($request->id);
        if (isset($medicoEscolhido->consulta_medicos)) {
            $consulta_medicos = $medicoEscolhido->consulta_medicos;
        } else {
            $consulta_medicos = null;
        }
        return view('relatorios/listaMedicosConsultas', compact('pacientes', 'medicos', 'medicoEscolhido', 'consulta_medicos'));
    }
}