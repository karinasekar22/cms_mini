<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class PermissionController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:view permission', only: ['index']),
            new Middleware('permission:create permission', only: ['create']),
            new Middleware('permission:edit permission', only: ['edit']),
            new Middleware('permission:delete permission', only: ['delete']),
        ];
    }


    // This method will show permission page
    public function index()
    {
        $permissions = Permission::orderBy('name', 'ASC')->paginate(10);
        return view('permissions.list', [
            'permissions' => $permissions
        ]);

    }

    // This method will show create a permission
    public function create()
    {

        return view('permissions.create');

    }

    // This method will insert a permission in db
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|unique:permissions'
        ]);

        if ($validator->passes()) {
            Permission::create(['name' => $request->name]);
            return redirect()->route('permissions.list')->with('success', 'Permission added successfully.');
        } else {
            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }
    }

    // This method will show edit permission page
    public function edit($id)
    {
        //Take id first, then show it
        $permission = Permission::findOrFail($id);
        return view('permissions.edit', [
            'permission' => $permission
        ]);

    }

    // This method will update a permission in db
    public function update($id, Request $request)
    {
        $permission = Permission::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|unique:permissions,name, ' . $id . ',id'
        ]);

        if ($validator->passes()) {
            $permission->name = $request->name;
            $permission->save();

            return redirect()->route('permissions.list')->with('success', 'Permission updated successfully.');
        } else {
            return redirect()->route('permissions.edit', $id)->withInput()->withErrors($validator);
        }
    }

    // This method will delete a permission in db
    public function delete(Request $request)
    {
        $id = $request->id;
        $permission = Permission::findOrFail($id);

        if ($permission == null) {
            session()->flash('error', 'Permission not found');
            return response()->json([
                'status' => false,
            ]);
        }

        $permission->delete();
        session()->flash('success', 'Permission deleted succesfully');
        return response()->json([
            'status' => true
        ]);
    }
}
