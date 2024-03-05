<?php

namespace App\Http\Controllers;

use App\Models\Enrolment;
use Illuminate\Http\Request;

class EnrolmentController extends Controller
{
    public function callback($id, Request $request)
    {
        $enrolment = Enrolment::findOrFail($id);
        $token = $request->query('token');
        $enrolment->payment_details = json_encode([
            'token' => $token
        ]);
        $enrolment->payment_status = 'validated';
        $enrolment->save();
        return view('payment_callback');
    }
}
