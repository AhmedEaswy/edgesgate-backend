<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->get();
        $projects = Project::active()->ordered()->get();

        $settings = Setting::active()->get()->groupBy(fn ($item) => $item->group->value)
            ->map(fn ($group) => $group->pluck('value', 'name'));

        return view('home', compact('services', 'projects', 'settings'));
    }
}

