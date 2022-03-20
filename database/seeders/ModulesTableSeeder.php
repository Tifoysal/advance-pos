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
            $check_users = Module::firstOrCreate([
                'name' => 'Users',
                'status' => 'active'
            ]);
            //user - permission
            $permissions=['users.index','users.index2','users.create','users.store','users.show','users.edit','users.update','users.destroy'];
            foreach ($permissions as $permission)
            {
                Permission::firstOrCreate([
                    'module_id'=>$check_users->id,
                    'name'=>$permission,
                    'slug'=>Str::slug($permission)
                ]);
            }



            $category = Module::firstOrCreate([
                'name' => 'Category',
                'status' => 'active'
            ]);

            //user - permission
            $category_permissions = ['category.list', 'category.add', 'category.store', 'category.view', 'category.edit', 'category.update', 'delete.category'];
            foreach ($category_permissions as $permission) {
                Permission::firstOrCreate([
                    'module_id' => $category->id,
                    'name' => $permission,
                    'slug' => Str::slug($permission)
                ]);
            }



            //Category
            $role = Module::firstOrCreate([
                'name' => 'Role',
                'status' => 'active'
            ]);
            //user - permission
            $role_permissions = ['role.list', 'role.add', 'role.store', 'role.view', 'role.edit', 'role.update', 'role.category'];
            foreach ($role_permissions as $permission) {
                Permission::firstOrCreate([
                    'module_id' => $role->id,
                    'name' => $permission,
                    'slug' => Str::slug($permission)
                ]);
            }
        }




}
