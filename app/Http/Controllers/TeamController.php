<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Team::all();
        return view('cms.team.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator(
            $request->all(),
            [
                'name_en' => 'required|string|min:3',
                'name_ar' => 'required|string|min:3',
                'description_en' => 'required|string|min:3',
                'description_ar' => 'required|string|min:3',
                'team_image' => 'required|max:2024|mimes:png,jpg',

            ]
        );

        if (!$validator->fails()) {
            $team = new Team();
            $team->name = [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ];
            $team->description = [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ];

            // save image
            if ($request->hasFile('team_image')) {
                $image = $request->file('team_image');
                $imageName = time() . '_team_Section.' . $image->getClientOriginalExtension();
                $image->storeAs('images', $imageName, ['disk' => 'public']);
                $team->image = $imageName;
            }


            $isSave = $team->save();
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
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('cms.team.update',['team'=>$team]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $team = Team::findOrFail($id);
        $validator = Validator($request->all(), [
            'name_en' => 'required|string|min:3',
            'name_ar' => 'required|string|min:3',
            'description_en' => 'required|string|min:3',
            'description_ar' => 'required|string|min:3',
            'team_image' => 'nullable|max:2024|mimes:png,jpg',
        ]);

        if ($validator->fails()) {
            toastr()->error($validator->getMessageBag()->first());
            return redirect()->back();
        }

        $team->name = [
            'en' => $request->name_en,
            'ar' => $request->name_ar,
        ];

        $team->description = [
            'en' => $request->description_en,
            'ar' => $request->description_ar,
        ];

        // Delete the old image if it exists

        // Storage::exists(filePath) == $request->hasFile('team_image')
        if ($request->hasFile('team_image')) {
            Storage::delete('images/' . $team->icon);


            if ($request->hasFile('team_image')) {
                $image = $request->file('team_image');
                $imageName = time() . '_team_Section_' . $image->getClientOriginalExtension();
                $image->storeAs('images', $imageName, ['disk' => 'public']);
                $team->image = $imageName;
            }
        }
        $team->save();
        toastr()->success('Data has been Updated successfully!');
        return redirect()->route('teams.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team=Team::findOrFail($id);
        $isDelete = $team->delete();

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
