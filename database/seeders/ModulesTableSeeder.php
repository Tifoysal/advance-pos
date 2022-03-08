<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\AssignOp\Mod;

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
        $check_users=Module::where('name','Users')->first();
        if(!$check_users)
        {
            $module=Module::create([
                'name'=>'Users',
                'status'=>'active'
            ]);
            //user - permission
            $permissions=['users.index','users.create','users.store','users.show','users.edit','users.update','users.destroy'];
            foreach ($permissions as $permission)
            {
                Permission::create([
                    'module_id'=>$module->id,
                    'name'=>$permission,
                    'slug'=>Str::slug($permission)
                ]);
            }
        }

        $check_Category=Module::where('name','Category')->first();
        if(!$check_Category) {
            //Category
            $category = Module::create([
                'name' => 'Category',
                'status' => 'active'
            ]);
            //user - permission
            $category_permissions = ['category.list', 'category.add', 'category.store', 'category.view', 'category.edit', 'category.update', 'delete.category'];
            foreach ($category_permissions as $permission) {
                Permission::create([
                    'module_id' => $category->id,
                    'name' => $permission,
                    'slug' => Str::slug($permission)
                ]);
            }
        }



    }
}
