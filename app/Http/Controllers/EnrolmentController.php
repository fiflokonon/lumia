<?php

namespace App\Http\Controllers;

use App\Mail\InscriptionConfirmation;
use App\Mail\InscriptionValidation;
use App\Models\Enrolment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $enrolment->resource_access = true;
        $enrolment->save();
        Mail::to($enrolment->user->email)->send(new InscriptionValidation($enrolment->formation, $enrolment));
        return view('payment_callback');
    }
}
