<?php


use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * @param $role_id
 * @param $route
 * @return String|bool
 */
function getPermissions( $role_id, $route)
{
//  $permission_id= Permission::where('name',$route)->first()->id??'';
//
//if($permission_id)
//{
//    $role= RolePermission::where('role_id',$role_id)
//        ->where('permission_id',$permission_id)->get();
//    if($role)
//    {
//        return true;
//    }
//}
//    return false;
    $permission= Permission::where('name',$route)->with('role_permission',function ($query) use($role_id){
        return $query->where('role_id',$role_id)->first();
    })->first();

        if($permission && $permission->role_permission->count()>0)
        {
            return true;
        }
    return false;
}

