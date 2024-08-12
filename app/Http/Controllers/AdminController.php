<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Admin::where('id', '!=', auth('admin')->id())->get();
        return response()->view('cms.admin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.admin.create');
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
                'name' => 'required|string|min:3|max:35',
                'email' => 'required|email',
                'active' => 'required|boolean',
            ],
            [
                'name.required' => 'admin Name is required',
                // 'unique'  => ':attribute is already used',
                // 'email.unique' => 'The email has already been taken'
            ]
        );
        if (!$validator->fails()) {
            $admin = new Admin();
            $admin->name = $request->get('name');
            $admin->email = $request->get('email');
            $admin->password = Hash::make('123456');
            $admin->active=$request->get('active');

            // $admin->name =$request->get('active');
            $isSaved = $admin->save();
            if ($isSaved) {
                return response()->json([
                    'message' => 'Admin Created Sucessfully',
                    Response::HTTP_OK,
                ]);
            } else {
                return response()->json([
                    'message' => 'Falear To Save',
                    Response::HTTP_BAD_REQUEST,
                ]);
            }
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
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return response()->view('cms.admin.update',['admin'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $admin= Admin::findOrFail($id);
        $validaotr = Validator($request->all(),[
            // required
            'name'=> 'required|string|min:3|max:35',
            'email'=> 'required|email',
        ]);
        if (!$validaotr->fails()) {
            $isUpdate= $admin->update($request->all());
            if($isUpdate){
                return response()->json(['message'=>'Admin Update Successfully'],Response::HTTP_OK);
            }else{
                return response()->json(['message'=>'Failed To Update'],Response::HTTP_BAD_REQUEST);
            }
        }else{
            return response()->json(['message'=> $validaotr->getMessageBag()->first()],REsponse::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $admin =Admin::findOrFail($id);
        $isDeleted = $admin->delete();
        if ($isDeleted) {
            return response()->json([
                'title' => ' Success Deleted!',
                'text' => 'Admin Deleted Successfully',
                'icon' => 'success',
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'title' => ' Failed Deleted!',
                'text' => 'Failed To Delete',
                'icon' => 'error',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
