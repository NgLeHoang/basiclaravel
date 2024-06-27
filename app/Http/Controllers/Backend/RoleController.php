<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use DB;

class RoleController extends Controller
{
    // All permission method
    public function AllPermission() {
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permissions'));
    }

    public function AddPermission() {
        return view('backend.pages.permission.add_permission');
    }

    public function StorePermission(Request $request) {
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name
        ]);

        $notification = array(
            'message' => 'Permission Add Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    }

    public function EditPermission($id) {
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission', compact('permission'));
    }

    public function UpdatePermission(Request $request) {
        $pId = $request->id;
        Permission::findOrFail($pId)->update([
            'name' => $request->name,
            'group_name' => $request->group_name
        ]);

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    }

    public function DeletePermission($id) {
        Permission::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // All role method
    public function AllRole() {
        $roles = Role::all();
        return view('backend.pages.role.all_role', compact('roles'));
    }

    public function AddRole() {
        return view('backend.pages.role.add_role');
    }

    public function StoreRole(Request $request) {
        $role = Role::create([
            'name' => $request->name
        ]);

        $notification = array(
            'message' => 'Role Add Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.role')->with($notification);
    }

    public function EditRole($id) {
        $role = Role::findOrFail($id);
        return view('backend.pages.role.edit_role', compact('role'));
    }

    public function UpdateRole(Request $request) {
        $rId = $request->id;
        Role::findOrFail($rId)->update([
            'name' => $request->name
        ]);

        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.role')->with($notification);
    }

    public function DeleteRole($id) {
        Role::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // Add role in permisson all method
    public function AddRolePermission() {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.pages.rolesetup.add_role_permission', compact('roles', 'permissions', 'permission_groups'));
    }

    public function StoreRolePermission(Request $request) {
        $data = array();
        $permissions = $request->permission;

        foreach($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

        $notification = array(
            'message' => 'Role Has Permission Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.role.permission')->with($notification);
    }

    public function AllRolePermission() {
        $roles = Role::all();
        return view('backend.pages.rolesetup.all_role_permission', compact('roles'));
    }

    public function AdminEditRole($id) {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();

        return view('backend.pages.rolesetup.edit_role_permission', compact('role', 'permissions', 'permission_groups'));
    }

    public function AdminRoleUpdate(Request $request, $id) {
        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        \Log::info('Permissions:', $permissions);
        
        if(!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message' => 'Role Has Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.role.permission')->with($notification);
    }

    public function AdminDeleteRole($id) {
        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }

        $notification = array(
            'message' => 'Role Has Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}