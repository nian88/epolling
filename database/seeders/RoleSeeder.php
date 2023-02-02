<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        try {
          DB::beginTransaction();
            DB::table('roles')->insert([
                'name'      => 'Superadmin',
            ]);

            Role::create(['name' => 'member']);
        }catch (\Throwable $th){
            echo "error : {$th}";
            DB::rollBack();
        }
        DB::commit();
    }
}
