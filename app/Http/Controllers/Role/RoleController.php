<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller; // Import the base Controller

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
{
    return [
        
        new Middleware( 'permission:view roles', only: ['index']),
        new Middleware( 'permission:edit roles', only: ['edit']),
        new Middleware( 'permission:create roles', only: ['create']),
        new Middleware( 'permission:delete roles', only: ['destroy']),
      
    ];
}
    public function index()
    {
        $roles = Role::orderBy('name', 'ASC')->paginate(10);
        return view('Roles.list',[
            'roles' => $roles
        ]);
    }

    // This function creates the permission page
    public function create()
    {
        // Fetch permissions with pagination
        $permissions = Permission::orderBy('name', 'ASC')->get();

        // Return the view with the permissions data
        return view('Roles.create', [
            'permissions' => $permissions
        ]);

    }

    // This function stores the permission in the database
    public function store(Request $request)
    {
         // Correct validation rules
         $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|min:3', // separate unique and min rules
        ]);

        if ($validator->passes()) {
            // Save permission
            //dd($request->permission);
          $role = Role::create(['name' => $request->name]); // create role
            
            if(!empty($request->permission)){
                foreach($request->permission as $name){
                    $role->givePermissionTo($name);
                }
            }

            return redirect()->route('Roles.index')->with('success', 'Roles added successfully');
        } else {
            return redirect()->route('Roles.create')->withInput()->withErrors($validator);
        }
    }

    // This function loads the edit permission page
    public function edit($id)
    {
        $role = Role::findOrFail(id: $id);
        $hasPermissions = $role->permissions->pluck('name');
        $permissions = Permission::orderBy('name', 'ASC')->get();

        return view('Roles.edit',[
            'permissions' => $permissions,
            'hasPermissions' => $hasPermissions,
            'role' => $role
        ]);
    }

    // This function updates the permission in the database
    
    public function update($id, Request $request)
    {
        $role = Role::findOrFail(id: $id);

        // Correct validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:roles,name,'.$id.',id' // separate unique and min rules
        ]);

        if ($validator->passes()) {
            // Update permission
            $role->name = $request->name;
            $role->save();

            if(!empty($request->permission)){
                $role->syncPermissions($request->permission);
            }
            else{
                $role->syncPermissions([]);
            }


            return redirect()->route('Roles.index')->with('success', 'Roles updated successfully');
        } else {
            return redirect()->route('Roles.edit', $id)->withInput()->withErrors($validator);
        }
}

    // This function deletes the permission from the database
    public function destroy(Request $request, $id)
    {
        $role = Role::find($id);
        
        if ($role === null) {
            session()->flash('error', 'Roles not found');
            return response()->json([
                'status' => false
            ]);
        }

        // Check if the delete operation is successful
        if ($role->delete()) {
            session()->flash('success', 'Role deleted successfully');
            return response()->json([
                'status' => true
            ]);
        } else {
            session()->flash('error', 'Failed to delete Role');
            return response()->json([
                'status' => false
            ]);
        }
    }
}