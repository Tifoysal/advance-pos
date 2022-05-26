<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'role_id'=>1,
            'password'=>bcrypt('123456'),
            'membership_type'=>'free'
        ]);
        User::factory()->count(5)->create();

            $data = [
                ['role_id' => '1', 'permission_id' => 1],
                ['role_id' => '1', 'permission_id' => 9],
                ['role_id' => '1', 'permission_id' => 16],
                ['role_id' => '1', 'permission_id' => 23],
                ['role_id' => '1', 'permission_id' => 30],
                ['role_id' => '1', 'permission_id' => 31],
              ];
              DB::table('role_permissions')->insert($data);


    }
}
