<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Feature::all();
        return view('cms.features.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $icons = DB::table('icons')->get();
        // $icons= DB::table('icons')->select('icon')->get();
        // dd($icons);
        $icons = DB::table('icons')->orderBy('id','desc')->pluck('icon');

        return view('cms.features.create',compact('icons'));
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
                'icon' => 'required|string',

            ]
        );

        if (!$validator->fails()) {
            $features = new Feature();
            $features->title = [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ];

            // save image
            // if ($request->hasFile('image')) {
            //     $image = $request->file('image');
            //     $imageName = time() . '_features_Section.' . $image->getClientOriginalExtension();
            //     $image->storeAs('images', $imageName, ['disk' => 'public']);
            //     $features->icon = $imageName;
            // }

            $features->icon =$request->icon;
            $isSave = $features->save();
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
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        // $feature = Feature::findOrFail($id);
        $icons = DB::table('icons')->orderBy('id','desc')->pluck('icon');
        return view('cms.features.update',compact('feature','icons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        // dd($request->all());
        $feature = Feature::findOrFail($id);
        $validator = Validator($request->all(), [
            'title_en' => 'required|string|min:3',
            'title_ar' => 'required|string|min:3',
            'icon' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            toastr()->error($validator->getMessageBag()->first());
            return redirect()->back();
        }

        $feature->title = [
            'en' => $request->title_en,
            'ar' => $request->title_ar,
        ];

        if($request->has('icon')){
            $feature->icon = $request->get('icon');
        }
        $feature->save();
        toastr()->success('Data has been Updated successfully!');
        return redirect()->route('features.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        // $feature = Feature::findOrFail($id);
        $isDelete = $feature->delete();

        return response()->json(
            [
                'title' => $isDelete ? 'Success Delete' : 'Faild !!',
                'text' => $isDelete ? 'Feature Deleted Successfully' : 'Faild To Delete!',
                'icon' => $isDelete ? 'success' : 'error'
            ],
            $isDelete ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
