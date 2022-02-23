<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consulta';
    protected $fillable = ['pacientes_id', 'medicos_id', 'dt_consulta', 'hr_consulta', 'convenio', 'valor'];
    use HasFactory;

    public function medicos()
    {
        return $this->belongsTo(Medicos::class);
    }

    public function pacientes()
    {
        return $this->belongsTo(Pacientes::class);
    }
}