<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function show(Region $region){
        $countries = Country::all();
        return view('region', [
            'region' => $region,
            'countries' => $countries
        ]);
    }
}
