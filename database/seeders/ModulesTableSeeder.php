<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User
        $module=Module::create([
           'name'=>'Users'
        ]);
        //user - permission
        Permission::create([
           'module_id'=>$module->id,
            'name'=>'user.index'
        ]);


    }
}
