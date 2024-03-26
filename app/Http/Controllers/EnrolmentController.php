<?php

namespace App\Http\Controllers;


use App\Mail\InscriptionValidation;
use App\Models\Enrolment;
use BaconQrCode\Encoder\QrCode;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
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

    public function enrolment_certificate($id)
    {
        $enrolment = Enrolment::findOrFail($id);
        return view('pages.dashboard.formations.preview_certificate', ['enrolment' => $enrolment]);
    }

    public function download_certificate($id)
    {
        $enrolment = Enrolment::findOrFail($id);
        $pdf = PDF::loadView('pages.dashboard.formations.certificate', ['enrolment' => $enrolment]);
        $pdf->getDomPDF()->setPaper('A4', 'landscape');
        if (isset($enrolment->certificate_link) && $enrolment->certificate_link != null){
            return response()->download(public_path('/certificates/'.$enrolment->certificate_link), 'Certificat_Lumia_'.$enrolment->user->first_name. '_' .$enrolment->user_last_name . '.pdf');
        }else{
            $filename =  uniqid() .$enrolment->id. '.pdf';
            $pdfFilePath = public_path('/certificates/'.$filename);
            $pdf->save($pdfFilePath);
            $enrolment->certificate_link = $filename;
            $enrolment->save();
            return response()->download($pdfFilePath, 'Certificat_Lumia_'.$enrolment->user->first_name. '_' .$enrolment->user_last_name . '.pdf');
        }
    }

    public function get_certificate($id)
    {
        $enrolment = Enrolment::where('certificate_id', $id)->first();
        return view('pages.dashboard.formations.preview_certificate', ['enrolment' => $enrolment]);
    }

    public function generate_certificate($id)
    {
        $enrolment = Enrolment::findOrFail($id);
        #dd($enrolment);
        if ($enrolment->certificate_id == null){
            $cert_id = $this->generateCertificateId();
            $enrolment->certificate_id = $cert_id;
            $enrolment->certificate_qr_code_link = $this->generateQrCode($cert_id);
            $enrolment->save();
            return redirect()->route('get_certificate', $cert_id);
        }else{
            return redirect()->route('get_certificate', $enrolment->certificate_id);
        }
    }

    public function generateCertificateId($length = 10) {
        // Définition des caractères autorisés dans l'identifiant
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $certificateId = '';
        // Générer un identifiant aléatoire jusqu'à ce qu'il soit unique
        do {
            // Générer une suite aléatoire de caractères
            for ($i = 0; $i < $length; $i++) {
                $certificateId .= $characters[rand(0, $charactersLength - 1)];
            }
        } while (Enrolment::where('certificate_id', $certificateId)->exists());

        return $certificateId;
    }

    public function generateQrCode($certificateId) {
        // Lien vers le certificat
        $host = env('APP_URL');
        $certificateLink = "$host/certificates/$certificateId";
        // Configuration du rendu de l'image
        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new ImagickImageBackEnd()
        );
        // Écriture du code QR dans le fichier
        $writer = new Writer($renderer);
        $qrCodeFilePath = public_path("certificates/qr/$certificateId.png");
        $writer->writeFile($certificateLink, $qrCodeFilePath);
        // Retourner le chemin du fichier du code QR
        return $certificateId.'.png';
    }

}
