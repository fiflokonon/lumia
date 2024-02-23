<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use App\Models\TypeFormation;

class FormationController extends Controller
{
    public function index()
    {
        return view('pages.landing.formations.index', ['formations' => Formation::all()]);
    }

    public function type_formations($code)
    {
        $type = TypeFormation::where('code', $code)->first();
        return view('pages.dashboard.formations.index', ['formations' => $type->formations]);
    }
}
