<?php

namespace App\Http\Controllers;

use App\Models\BarangayInfo;
use App\Models\BrgyOfficial;
use App\Models\Place;
use App\Models\Program;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function searchPlace(Request $request)
    {
        $places = Place::where('name', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('type', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('description', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('location', 'LIKE', '%' . $request->keyword . '%')
            ->get();

        return view('more-places', ['places' => $places]);
    }

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

    public function aboutUs()
    {
        $captain = BrgyOfficial::where('position', 'Captain')->first();
        $brgyInfos = BarangayInfo::first();

        return view('about-us', [
            'captain' => $captain,
            'brgyInfos' => $brgyInfos,
        ]);
    }

    public function welcome()
    {
        $brgyCapt = BrgyOfficial::where('position', 'Captain')->first();
        $programs = Program::orderBy('created_at', 'desc')->get();
        $latest_programs = Program::orderBy('created_at', 'desc')->take(2)->get();
        $places = Place::orderBy('created_at', 'desc')->get();
        $latest_places = Place::orderBy('created_at', 'desc')->take(3)->get();
        $officials = BrgyOfficial::orderByRaw("CASE
                WHEN position = 'Captain' THEN 1
                WHEN position = 'Secretary' THEN 2
                WHEN position = 'Treasurer' THEN 3
                WHEN position = 'Kagawad' THEN 4
                WHEN position = 'SK' THEN 5
                ELSE 6
            END")->get();

        return view('welcome', [
            'brgyCapt' => $brgyCapt,
            'programs' => $programs,
            'latest_programs' => $latest_programs,
            'places' => $places,
            'latest_places' => $latest_places,
            'officials' => $officials,
        ]);
    }
}
