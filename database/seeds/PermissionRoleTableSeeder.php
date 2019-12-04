<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++){
            DB::table('permission_role')->insert([
                'permission_id' => rand(1,2),
                'role_id' => rand(1,2),
            ]);
        }
    }
}
