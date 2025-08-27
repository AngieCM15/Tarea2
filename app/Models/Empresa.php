<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas'; // Apunta a la tabla 'empresas'

    protected $fillable = ['nombre', 'ruc', 'direccion', 'telefono'];

    // Relación: una empresa tiene muchos productos
    public function productos()
    {
        return $this->hasMany(Product::class, 'empresa_id'); // Cambiamos 'company_id' a 'empresa_id' aquí
    }
}