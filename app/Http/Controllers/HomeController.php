<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Home::all();
        return response()->view('cms.home.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.home.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator(
            $request->all(),
            [
                'title_en' => 'required|string|min:3',
                'title_ar' => 'required|string|min:3',
                'description_en' => 'required|string|min:3',
                'description_ar' => 'required|string|min:3',
                'image' => 'required|max:2024|mimes:png,jpg',

            ]
        );

        if (!$validator->fails()) {
            $home = new Home();
            $home->title = [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ];
            $home->description = [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ];

            // save image
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_Home_Section.' . $image->getClientOriginalExtension();
                $image->storeAs('images', $imageName, ['disk' => 'public']);
                $home->image = $imageName;
            }


            $isSave = $home->save();
            return response()->json(
                ['message' => $isSave ? 'Date Save Successfully' : 'Failed To Save Data'],
                $isSave ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
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
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        return response()->view('cms.home.update', ['home' => $home]);
    }

    /**
     * Update the specified resource in storage.
     */



    public function update(Request $request, Home $home)
    {
        //return dd($request->all());

        $validator = Validator::make($request->all(), [
            'title_en' => 'required|string|min:3',
            'title_ar' => 'required|string|min:3',
            'description_en' => 'required|string|min:3',
            'description_ar' => 'required|string|min:3',
            'image' => 'nullable|max:2024|mimes:png,jpg',
        ]);

        if ($validator->fails()) {
            toastr()->error($validator->getMessageBag()->first());
            return redirect()->back();
        }

        $home->title = [
            'en' => $request->title_en,
            'ar' => $request->title_ar,
        ];

        $home->description = [
            'en' => $request->description_en,
            'ar' => $request->description_ar,
        ];

        if ($request->hasFile('home_image')) {
            $image = $request->file('home_image');
            $imageName = time() . '_Home_Section_' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, ['disk' => 'public']);
            $home->image = $imageName;
        }

        $home->save();
        toastr()->success('Data has been saved successfully!');
        // toastr('Data has been saved successfully', 'success', [], 'title');
        // session()->flash('success', 'Data has been saved successfully!');
        //   flash()->success('Your account has been re-activated.');
        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        $isDeleted = $home->delete();

        if ($isDeleted) {
            return response()->json([
                'title' => 'Success Delete', 'text' => 'Deleted Successfully',
                'icon' => 'success'
            ], Response::HTTP_OK);
        } else {
            return response()->json(
                ['title' => 'Failed!', 'text' => 'Failed To Deleted', 'icon' => 'error'],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    // Delete the old image if necessary
    // if ($model->image) {
    //     Storage::disk('public')->delete($model->image);
    // }
}
