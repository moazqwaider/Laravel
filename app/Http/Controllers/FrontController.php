<?php

namespace App\Http\Controllers;

use App\Models\About_us;
use App\Models\CardAbout;
use App\Models\Feature;
use App\Models\Home;
use App\Models\Services;
use App\Models\Team;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $home =Home::take(1)->first();
        $aboutUs=About_us::take(1)->first();
        $aboutCard=CardAbout::where('aboutId',$aboutUs->id)->get();
        $featuers = Feature::take(8)->get();
        $services = Services::take(8)->get();
        $teams= Team::all();
        return view('cms.front.index',[
            'home'=>$home,
            'aboutUs'=>$aboutUs,
            'aboutCard'=>$aboutCard,
            'featuers'=>$featuers,
            'services'=>$services,
            'teams'=>$teams,
        ]);
    }
}
