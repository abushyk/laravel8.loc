<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Region;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function show(Country $country){
        $regions = Region::all();
        return view('country', [
            'country' => $country,
            'regions' => $regions
        ]);
    }
}
