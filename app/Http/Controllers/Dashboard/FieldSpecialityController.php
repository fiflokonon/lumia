<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FieldSpeciality;
use Illuminate\Http\Request;

class FieldSpecialityController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.specialities.index', ['specialities' => FieldSpeciality::all()]);
    }
}
