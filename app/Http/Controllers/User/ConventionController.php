<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConventionAdmin\ConventionCenterLogin;
use App\Models\ConventionAdmin\ConventionCenterDetails;
use App\Models\ConventionAdmin\ConventionFacility;

class ConventionController extends Controller
{
    public function conventions(){
        $venues = ConventionCenterLogin::with('centreDetails','facilities')->get();
        return view("user.venue.index",compact('venues'));
    }

    public function show($id){
        return view("user.venue.show");
    }
}
