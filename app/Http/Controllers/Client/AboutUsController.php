<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\OurTeam;
use App\Models\Service;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::query()->first();
        $services = Service::query()->orderBy('position')->get();
        $ourTeams = OurTeam::query()->orderBy('position')->get();
        return view('client.pages.about-us', compact(
            'aboutUs', 'services', 'ourTeams'
        ));
    }
}
