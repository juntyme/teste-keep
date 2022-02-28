<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoVeiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =  Carbon::now();

        /** Criar Usuario */
        DB::table('tipo_veiculo')->insert(
            [
                ['tipo_veiculo' => 'Carro', 'created_at' => $data, 'updated_at' => $data],
                ['tipo_veiculo' => 'Moto', 'created_at' => $data, 'updated_at' => $data],
                ['tipo_veiculo' => 'Caminhão', 'created_at' => $data, 'updated_at' => $data]
            ]
        );
    }
}
