<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return response()->view('cms.user.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator(
            $request->all(),
            [
                'name'  => 'required|string|min:3|max:35',
                'email'  => 'required|string|email',
                'password' => 'required|string|confirmed|min:8|max:35',
                'active'  => 'required|boolean',

            ]
        );

        if (!$validator->fails()) {
            $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->active = $request->get('active');
            $isSaved = $user->save();
            return response()->json(
                [
                    'message' => $isSaved ? 'User Add Successfully' : 'Failed To Add User',
                ],
                $isSaved ? Response::HTTP_OK:Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
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
        $user = User::findOrFail($id)->first();
        return response()->view('cms.user.update',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator(
            $request->all(),
            [
                'name'  => 'required|string|min:3|max:35',
                'email'  => 'required|string|email',
                'active'  => 'required|boolean',

            ]
        );

        if (!$validator->fails()) {
            $user = User::findOrFail($id);
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->active = $request->get('active');
            $isSaved = $user->save();
            return response()->json(
                [
                    'message' => $isSaved ? 'User Updatd Successfully' : 'Failed To Update User',
                ],
                $isSaved ? Response::HTTP_OK:Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delet_user= User::findOrFail($id)->delete();
        if ($delet_user) {
            return response()->json(['title'=>'User Deleted Successfully','icon'=>'success',],
            Response::HTTP_OK
            );
        }else{
            return response()->json(['title'=>'Failed To Delete User','icon'=>'error'],
        Response::HTTP_BAD_REQUEST
        );
        }
    }
}
