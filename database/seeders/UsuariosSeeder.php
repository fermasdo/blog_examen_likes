<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Database\Factories\UsuarioFactory;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new Usuario();
        $usuario->login = 'admin';
        $usuario->password = bcrypt('admin');
        $usuario->save();
        
        Usuario::factory()->count(3)->create();
    }
}
