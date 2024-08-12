<?php

namespace App\Http\Controllers;

use App\Models\About_us;
use App\Models\CardAbout;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = About_us::withCount('cardabout')->get();
        // $aboutCount = CardAbout::where('aboutId',1)->count();
        return response()->view('cms.aboutus.index', [
            'data' => $data,
            // 'aboutCount'=>$aboutCount

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.aboutus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        /*

        	id	title	description	card_icon	card_title	card_description
        */
        $validator = Validator(
            $request->all(),
            [
                'title_en' => 'required|string|min:3',
                'title_ar' => 'required|string|min:3',
                'description_en' => 'required|string|min:3',
                'description_ar' => 'required|string|min:3',
                // 'image' => 'required|max:2024|mimes:png,jpg',

            ]
        );

        if (!$validator->fails()) {
            $about = new About_us();
            $about->title = [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ];
            $about->description = [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ];



            $isSave = $about->save();
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
    public function show(About_us $about_us)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $about = About_us::findOrFail($id);


        return view('cms.aboutus.update', ['about' => $about]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $about_us = About_us::findOrFail($id);
        $validator = Validator($request->all(), [
            'title_en' => 'required|string|min:3',
            'title_ar' => 'required|string|min:3',
            'description_en' => 'required|string|min:3',
            'description_ar' => 'required|string|min:3',

        ]);

        if ($validator->fails()) {
            toastr()->error($validator->getMessageBag()->first());
            return redirect()->back();
        }

        $about_us->title = [
            'en' => $request->title_en,
            'ar' => $request->title_ar,
        ];

        $about_us->description = [
            'en' => $request->description_en,
            'ar' => $request->description_ar,
        ];


        $about_us->save();
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $about = About_us::findOrFail($id);
        $isDelete = $about->delete();

        return response()->json(
            [
                'title' => $isDelete ? 'Success Delete' : 'Faild !!',
                'text' => $isDelete ? 'Card Deleted Successfully' : 'Faild To Delete!',
                'icon' => $isDelete ? 'success' : 'error'
            ],
            $isDelete ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }



    public function createCard($id)
    {
        $about = About_us::findOrFail($id);
        $icons = DB::table('icons')->orderBy('id', 'desc')->pluck('icon');

        return view(
            'cms.aboutus.card.create',
            [
                'about' => $about,
                'icons' => $icons,
            ]
        );
    }

    public function storeCard(Request $request)
    {

        $validator = Validator(
            $request->all(),
            [
                'card_title_en' => 'required|string|min:3',
                'card_title_ar' => 'required|string|min:3',
                'card_description_en' => 'required|string|min:3',
                'card_description_ar' => 'required|string|min:3',
                'icon' => 'required|string',

            ]
        );

        if (!$validator->fails()) {
            $cardAbout = new CardAbout();
            $cardAbout->card_title = [
                'en' => $request->card_title_en,
                'ar' => $request->card_title_ar,
            ];
            $cardAbout->card_description = [
                'en' => $request->card_description_en,
                'ar' => $request->card_description_ar,
            ];

            $cardAbout->aboutId = $request->get('aboutId');
            $cardAbout->card_icon = $request->get('icon');


            $isSave = $cardAbout->save();
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

    public  function showCard($id)
    {
        $data = CardAbout::where('aboutId', '=', $id)->get();
        return view('cms.aboutus.card.index', ['data' => $data]);
    }

    public function editCard($id)
    {
        $card = CardAbout::has('aboutUs')->findOrFail($id);
        $icons = DB::table('icons')->orderBy('id', 'desc')->pluck('icon');

        return view('cms.aboutus.card.update', [
            'card' => $card,
            'icons' => $icons,
        ]);
    }

    public function updateCard(Request $request, $id)
    {
        // dd($request->all());
        $cardAbout = CardAbout::findOrFail($id);

        $validator = Validator($request->all(), [
            'card_title_en' => 'required|string|min:3',
            'card_title_ar' => 'required|string|min:3',
            'card_description_en' => 'required|string|min:3',
            'card_description_ar' => 'required|string|min:3',
            'icon' => 'required|string',
        ]);

        if ($validator->fails()) {
            toastr()->error($validator->getMessageBag()->first());
            return redirect()->back();
        }


        $cardAbout->card_title = [
            'en' => $request->card_title_en,
            'ar' => $request->card_title_ar,
        ];

        $cardAbout->card_description = [
            'en' => $request->card_description_en,
            'ar' => $request->card_description_ar,
        ];

        $cardAbout->aboutId = $request->aboutId;
        if($request->has('icon')){
        $cardAbout->card_icon = $request->get('icon');

        }


        $cardAbout->save();
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('showcards', $cardAbout->aboutId);
    }

    public function deleteCard($id)
    {
        $card = CardAbout::findOrFail($id);
        $isDelete = $card->delete();

        return response()->json(
            [
                'title' => $isDelete ? 'Success Delete' : 'Faild !!',
                'text' => $isDelete ? 'Card Deleted Successfully' : 'Faild To Delete!',
                'icon' => $isDelete ? 'success' : 'error'
            ],
            $isDelete ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
