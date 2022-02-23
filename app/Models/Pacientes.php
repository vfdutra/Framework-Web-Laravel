<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    protected $table = 'pacientes';
    protected $fillable = ['nome', 'cpf', 'email', 'telefone', 'endereco', 'idade'];
    use HasFactory;

    public function consulta_pacientes()
    {
        return $this->hasMany(Consulta::class);
    }
}