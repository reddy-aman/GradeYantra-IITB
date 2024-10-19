<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller; // Import the base Controller
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class PermissionController extends Controller implements HasMiddleware
{
    public static function middleware(): array
{
    return [
        
        new Middleware( 'permission:view permission', only: ['index']),
        new Middleware( 'permission:edit permission', only: ['edit']),
        new Middleware( 'permission:create permission', only: ['create']),
        new Middleware( 'permission:delete permission', only: ['destroy']),
      
    ];
}
    // This function shows the permission page
    public function index()
    {
        // Fetch permissions with pagination
        $permissions = Permission::orderBy('created_at', 'DESC')->paginate(5);

        // Return the view with the permissions data
        return view('permissions.list', [
            'permissions' => $permissions
        ]);
    }

    // This function creates the permission page
    public function create()
    {
        return view('permissions.create');
    }

    // This function stores the permission in the database
    public function store(Request $request)
    {
        // Correct validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3', // separate unique and min rules
        ]);

        if ($validator->passes()) {
            // Save permission
            Permission::create(['name' => $request->name]);
            return redirect()->route('permissions.index')->with('success', 'Permission added successfully');
        } else {
            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }
    }

    // This function loads the edit permission page
    public function edit($id)
    {
        $Permission = Permission::findOrFail($id);
        return view('permissions.edit',[
            'Permission' => $Permission
        ]);
    }

    // This function updates the permission in the database
    public function update($id, Request $request)
    {
        $Permission = Permission::findOrFail($id);

        // Correct validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:permissions,name,'.$id.',id' // separate unique and min rules
        ]);

        if ($validator->passes()) {
            // Update permission
            $Permission->name = $request->name;
            $Permission->save();

            return redirect()->route('permissions.index')->with('success', 'Permission updated successfully');
        } else {
            return redirect()->route('permissions.edit', $id)->withInput()->withErrors($validator);
        }
    }

    // This function deletes the permission from the database
    public function destroy(Request $request, $id)
    {
        $Permission = Permission::find($id);
        
        if ($Permission === null) {
            session()->flash('error', 'Permission not found');
            return response()->json([
                'status' => false
            ]);
        }

        // Check if the delete operation is successful
        if ($Permission->delete()) {
            session()->flash('success', 'Permission deleted successfully');
            return response()->json([
                'status' => true
            ]);
        } else {
            session()->flash('error', 'Failed to delete permission');
            return response()->json([
                'status' => false
            ]);
        }
    }
}
