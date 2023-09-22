<?php

namespace App\Http\Controllers;

use App\Models\BrgyOfficial;
use App\Models\Place;
use App\Models\Program;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function showPlaces()
    {
        $places = Place::orderBy('created_at', 'desc')->get();

        return view('more-places', ['places' => $places]);
    }
    
    public function showPlace(Request $request)
    {
        $place = Place::find($request->id);

        return view('show-place', ['place' => $place]);
    }

    public function showPrograms()
    {
        $programs = Program::orderBy('created_at', 'desc')->get();

        return view('more-programs', ['programs' => $programs]);
    }

    public function showProgram(Request $request)
    {
        $program = Program::find($request->id);

        return view('show-program', ['program' => $program]);
    }

    public function welcome()
    {
        $brgyCapt = BrgyOfficial::where('position', 'Captain')->first();
        $programs = Program::orderBy('created_at', 'desc')->take(3)->get();
        $places = Place::orderBy('created_at', 'desc')->get();
        $officials = BrgyOfficial::where('position', '!=','Captain')
        ->orderByRaw("CASE
                WHEN position = 'Secretary' THEN 1
                WHEN position = 'Treasurer' THEN 2
                WHEN position = 'Kagawad' THEN 3
                WHEN position = 'SK' THEN 4
                ELSE 5
            END")->get();

        return view('welcome', [
            'brgyCapt' => $brgyCapt,
            'programs' => $programs,
            'places' => $places,
            'officials' => $officials,
        ]);
    }
}
