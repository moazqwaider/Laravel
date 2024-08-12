<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::withCount('permissions')->get();
        return response()->view('cms.role.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.role.create');
        //
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
            $roles = new Role();
            $roles->name = $request->get('name');
            $roles->guard_name = $request->get('guard_name');
            $isSaved = $roles->save();
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
        $role = Role::findOrFail($id);
        return response()->view('cms.role.update', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);

        $validator = Validator(
            $request->all(),
            [
                'name'  => 'required|string|min:3|max:35',
                'guard_name'  => 'required|string|in:admin,user',
            ]
        );
        if (!$validator->fails()) {

            $role->name = $request->get('name');
            $role->guard_name = $request->get('guard_name');
            $isSaved = $role->save();
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
        $role = Role::findOrFail($id);
        $isDeleted = $role->delete();

        if ($isDeleted) {
            return response()->json([
                'title' => 'Success Delete', 'text' => 'Role Deleted Successfully',
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
