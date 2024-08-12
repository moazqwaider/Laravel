<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    //
    public function showLogin($guard)
    {
        return response()->view('cms.auth.login', ['guard' => $guard]);
    }
    public function login(Request $request)
    {

        $validator = Validator(
            $request->all(),
            [
                // exists in tabel,cloumn
                // 'email' => 'required|email|exists:admins,email',
                'email' => 'required|email',
                'password' => 'required|string|min:5|max:30',
                'remember' => 'required|boolean',
                'guard' => 'required|string|in:admin,user'
            ],
            [
                'guard,in' => 'Pleas cheak Login URL',
            ]
        );
        if (!$validator->fails()) {
            $credentials = [
                'email' => $request->get('email'),
                'password' => $request->get('password'),
            ];
            if (Auth::guard($request->get('guard'))->attempt($credentials, $request->get('remember'))) {
                return response()->json(['message' => 'Successfully Login In'], Response::HTTP_OK);
            } else {
                return response()->json(['message' => 'Credentials Not Correcte Try Agin'], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
    public function logout(Request $request)
    {
        // First methods
        // auth('admin')->logout();


        $guard = auth('admin')->check() ? 'admin' : 'user';
        //second methods
        Auth::guard($guard)->logout();
        // Clear Session
        $request->session()->invalidate();
        return redirect()->route('login', $guard);
    }

    public function editPassword()
    {
        $guard = auth('admin')->check() ? 'admin' : 'user';
        return response()->view('cms.auth.change-password');
    }


    public function updatePassword(Request $request)
    {
        $validator = Validator(
            $request->all(),
            [
                'password' => 'required|string|min:6',
                'new_password' => 'required|string|confirmed|min:6',
                // 'new_password_confirmation' => 'required|string|min:6',
            ]
        );
        $guard = auth('admin')->check() ? 'admin' : 'user';
        $user = auth($guard)->user()->password;
        if (Hash::check($request->get('password'), $user)) {

            if (!$validator->fails()) {
                $admin = auth('admin')->user();
                $admin->password = Hash::make($request->get('new_password'));
                $admin->save();

                return response()->json(
                    ['message' => 'Password Change Successfully'],
                    Response::HTTP_OK
                );
            } else {
                return response()->json(
                    ['message' => $validator->getMessageBag()->first()],
                    Response::HTTP_BAD_REQUEST
                );
            }
        } else {
            return response()->json(
                ['message' => 'The password is incorrect'],
                Response::HTTP_BAD_REQUEST
            );
        }
    }


    // public function updatePassword(Request $request)
    // {
    //     $guard = auth('admin')->check() ? 'admin' : 'user';
    //     $validator = Validator(
    //         $request->all(),
    //         [
    //             'c_password' => "required|string|password:$guard",
    //             'new_password' => 'required|string|confirmed|min:6',
    //         ]
    //     );

    //     if (!$validator->fails()) {
    //         $admin = auth($guard)->user();
    //         $admin->password = Hash::make($request->get('new_password'));
    //         $admin->save();

    //         return response()->json(
    //             ['message' => 'Password Change Successfully'],
    //             Response::HTTP_OK
    //         );
    //     } else {
    //         return response()->json(
    //             ['message' => $validator->getMessageBag()->first()],
    //             Response::HTTP_BAD_REQUEST
    //         );
    //     }
    // }


    public function updateProfile()
    {
        $view = auth('admin')->check() ? 'cms.admin.update' : 'cms.user.update';
        $guard = auth('admin')->check() ? 'admin' : 'user';

        return response()->view($view, [
            $guard => auth($guard)->user(),
            'redirect' => false
        ]);
    }
}
