<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Product extends Model
    {
        use HasFactory;

        // Campos rellenables (ahora en español)
        protected $fillable = ['nombre', 'empresa_id', 'precio', 'stock', 'imagen'];

        // Relación: un producto pertenece a una empresa
        public function empresa() // Cambiado de 'company()' a 'empresa()'
        {
            return $this->belongsTo(Empresa::class, 'empresa_id'); // Apunta al modelo Empresa y a la columna empresa_id
        }
    }
    