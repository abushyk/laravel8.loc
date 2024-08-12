<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Region;
use Illuminate\Http\Request;

class FallbackController extends Controller
{
    public function index($any){
        //dd($any);
        $country = Country::where('slug', $any)->first();
        if($country){
            return app(CountryController::class)->show($country);
        }

        $region = Region::where('slug', $any)->first();
        if($region){
            return app(RegionController::class)->show($region);
        }
        return '404';
    }



    public function empty(string $slug){
        dd($slug);
        return;
    }
}
