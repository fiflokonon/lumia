<?php

namespace App\Http\Controllers;


use App\Mail\InscriptionValidation;
use App\Models\Enrolment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

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

    public function preview_certificate($id)
    {
        $enrolment = Enrolment::findOrFail($id);
        return view('pages.dashboard.formations.preview_certificate', ['enrolment' => $enrolment]);
    }

    public function download_certificate($id)
    {
        $enrolment = Enrolment::findOrFail($id);
        $pdf = PDF::loadView('pages.dashboard.formations.certificate', ['enrolment' => $enrolment]);
        $pdf->getDomPDF()->setPaper('A4', 'landscape');
        if (isset($enrolment->certificate_link)){
            return response()->download($enrolment->certificate_link, 'Certificat_Lumia_'.$enrolment->user->first_name. '_' .$enrolment->user_last_name . '.pdf');
        }else{
            $pdfFilePath = public_path('/certificates/'. uniqid() .$enrolment->id. '.pdf');
            #return $pdf->download($pdfFilePath);
            $pdf->save($pdfFilePath);
            $enrolment->certificate_link = $pdfFilePath;
            return response()->download($pdfFilePath, 'Certificat_Lumia_'.$enrolment->user->first_name. '_' .$enrolment->user_last_name . '.pdf');
        }
    }

}
