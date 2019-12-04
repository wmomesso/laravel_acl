<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++){
            DB::table('role_user')->insert([
                'user_id' => rand(1,2),
                'role_id' => rand(1,2),
            ]);
        }
    }
}
