<?php

namespace App\Http\Controllers;

use App\Models\Enrolment;
use Illuminate\Http\Request;

class EnrolmentController extends Controller
{
    public function callback($id)
    {
        $enrolment = Enrolment::findOrFail($id);
        $enrolment->payment_status = 'validated';
        $enrolment->save();
        return view('payment_callback');
    }
}
