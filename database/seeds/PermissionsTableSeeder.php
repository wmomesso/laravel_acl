<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'view' => 'Visualizar',
            'edit' => 'Editar',
            'delete' => 'Excluir',
            'create' => 'Criar'
        ];
        foreach($data as $key => $value){
            DB::table('permissions')->insert([
                'name' => $key,
                'label' => $value,
            ]);
        }
    }
}
