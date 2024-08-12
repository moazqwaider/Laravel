<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $permissions = Permission::all();
        return response()->view('cms.permission.index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator(
            $request->all(),
            [
                'name'  => 'required|string|min:3|max:35',
                'guard_name'  => 'required|string|in:admin,user',
            ]
        );
        if (!$validator->fails()) {
            $permissions = new Permission();
            $permissions->name = $request->get('name');
            $permissions->guard_name = $request->get('guard_name');
            $isSaved = $permissions->save();
            return response()->json(
                ['message' => $isSaved ? 'Roles Created Successfully' : 'Failed To Create Role'],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = Permission::findOrFail($id);
        return response()->view('cms.permission.update', ['permission' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permission = Permission::findOrFail($id);
        $validator = Validator(
            $request->all(),
            [
                'name'  => 'required|string|min:3|max:35',
                'guard_name'  => 'required|string|in:admin,user',
            ]
        );
        if (!$validator->fails()) {

            $permission->name = $request->get('name');
            $permission->guard_name = $request->get('guard_name');
            $isSaved = $permission->save();
            return response()->json(
                ['message' => $isSaved ? 'Roles Created Successfully' : 'Failed To Create Role'],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::findOrFail($id);
        $isDeleted = $permission->delete();

        if ($isDeleted) {
            return response()->json([
                'title' => 'Success Delete',
                'text' => 'Permission Deleted Successfully',
                'icon' => 'success'
            ], Response::HTTP_OK);
        } else {
            return response()->json(
                ['title' => 'Failed!', 'text' => 'Failed To Deleted', 'icon' => 'error'],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
}
