<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Services::all();
        return view('cms.services.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $icons = DB::table('icons')->orderBy('id','desc')->pluck('icon');

        return view('cms.services.create',compact('icons'));
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
                'icon' => 'required|string',

            ]
        );

        if (!$validator->fails()) {
            $services = new Services();
            $services->title = [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ];
            $services->description = [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ];
            $services->icon = $request->get('icon');


            // save image
            // if ($request->hasFile('image')) {
            //     $image = $request->file('image');
            //     $imageName = time() . '_services_Section.' . $image->getClientOriginalExtension();
            //     $image->storeAs('images', $imageName, ['disk' => 'public']);
            //     $services->icon = $imageName;
            // }


            $isSave = $services->save();
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
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {           $icons = DB::table('icons')->orderBy('id','desc')->pluck('icon');

        $services = Services::findOrFail($id);
        return view('cms.services.update',
        [
            'services' => $services,
            'icons' => $icons

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // dd($request->all());
        $services = Services::findOrFail($id);
        $validator = Validator($request->all(), [
            'title_en' => 'required|string|min:3',
            'title_ar' => 'required|string|min:3',
            'description_en' => 'required|string|min:3',
            'description_ar' => 'required|string|min:3',
            'icon' => 'required|string',
        ]);

        if ($validator->fails()) {
            toastr()->error($validator->getMessageBag()->first());
            return redirect()->back();
        }

        $services->title = [
            'en' => $request->title_en,
            'ar' => $request->title_ar,
        ];

        $services->description = [
            'en' => $request->description_en,
            'ar' => $request->description_ar,
        ];
        $services->icon = $request->get('icon');
        // Delete the old image if it exists

        // Storage::exists(filePath) == $request->hasFile('services_icon')
        // if ($request->hasFile('services_icon')) {
        //     Storage::delete('images/' . $services->icon);


        //     if ($request->hasFile('services_icon')) {
        //         $image = $request->file('services_icon');
        //         $imageName = time() . '_services_Section_' . $image->getClientOriginalExtension();
        //         $image->storeAs('images', $imageName, ['disk' => 'public']);
        //         $services->icon = $imageName;
        //     }
        // }
        $services->save();
        toastr()->success('Data has been Updated successfully!');
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $services = Services::findOrFail($id);
        $isDelete = $services->delete();

        return response()->json(
            [
                'title' => $isDelete ? 'Success Delete' : 'Faild !!',
                'text' => $isDelete ? 'Services Deleted Successfully' : 'Faild To Delete!',
                'icon' => $isDelete ? 'success' : 'error'
            ],
            $isDelete ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
