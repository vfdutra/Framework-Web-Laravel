<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    protected $table = 'medicos';
    protected $fillable = ['nome', 'cpf', 'email', 'telefone', 'crm', 'especialidade'];
    use HasFactory;

    public function consulta_medicos()
    {
        return $this->hasMany(Consulta::class);
    }
}