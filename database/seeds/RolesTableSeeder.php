<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'manager' => 'Manager',
            'editor' => 'Editor',
            'adm' => 'Administrator'
        ];
        foreach($data as $key => $value){
            DB::table('roles')->insert([
                'name' => $key,
                'label' => $value,
            ]);
        }

    }
}
