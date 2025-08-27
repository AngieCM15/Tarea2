    <?php

    namespace Database\Seeders;

    use App\Models\Empresa; // Cambiado de User
    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
            // limpiar tablas antes de insertar
            \App\Models\Empresa::truncate();
            \App\Models\Product::truncate();

            // crear empresas
            $lenovo = Empresa::create(['nombre' => 'Lenovo', 'ruc' => '12345678901', 'direccion' => 'Av. Principal 123', 'telefono' => '987654321']);
            $lg = Empresa::create(['nombre' => 'LG', 'ruc' => '10987654321', 'direccion' => 'Calle Secundaria 456', 'telefono' => '912345678']);
            $logi = Empresa::create(['nombre' => 'Logitech', 'ruc' => '11223344556', 'direccion' => 'Jr. Los Olivos 789', 'telefono' => '956789012']);

            // crear productos
            Product::create([
                'nombre' => 'Laptop Lenovo ThinkPad X1 Carbon',
                'empresa_id' => $lenovo->id,
                'precio' => 4200.00,
                'stock' => 'En Stock',
                'imagen' => 'uploads/thinkpad.jpg' // Ruta de ejemplo, asegúrate de tener la imagen en public/uploads
            ]);

            Product::create([
                'nombre' => 'Monitor LG UltraWide 29"',
                'empresa_id' => $lg->id,
                'precio' => 1200.00,
                'stock' => 'En Stock',
                'imagen' => 'uploads/monitor_lg.jpg' // Ruta de ejemplo
            ]);

            Product::create([
                'nombre' => 'Mouse Logitech MX Master 3',
                'empresa_id' => $logi->id,
                'precio' => 350.00,
                'stock' => 'Agotado',
                'imagen' => 'uploads/mouse_logitech.jpg' // Ruta de ejemplo
            ]);
        }
    }
    