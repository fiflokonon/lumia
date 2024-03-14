<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificat de Formation</title>
    <!-- Bootstrap CSS -->
    <link href="{{ public_path('/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        body {
            font-family: "DejaVu Sans Mono", serif;
            margin: auto; /* Centrer le contenu horizontalement */
            padding: 20px; /* Ajouter un espace autour du contenu */
        }
    </style>
</head>
<body>
    <div>
        <div class="card m-lg-4 m-1 position-relative" style="background-color: #ffffff; border: 2px #020202 solid; letter-spacing: 1px;" >
        <img src="{{public_path('/assets/images/logo.png')}}" alt="" class="col-3" style="margin-left: 220px;">
        <h2 class="fw-bolder" style="color: #518ffb; margin-left: 100px;"> CERTIFICAT DE COMPÉTENCE </h2>
        <p class="mb-1" style="margin-left: 250px;"> BJ01-SERA-S5-LC-2023 </p>
        <div class="col-1 border border-transparent rounded-circle" style="background-color: #f7df36; padding: 1px; margin-left: 250px;"> </div>
        <p class="my-3" style="margin-left: 200px;"> Ce certificat est attribué à </p>
        <h2 style="margin-left: 250px;">{{ $enrolment->user->last_name }} {{ $enrolment->user->first_name }}</h2>
        <div class="col-5 border border-transparent rounded-circle" style="background-color: #f7df36; padding: 1px; margin-left: 250px"> </div>
        <p class="my-2"> Pour avoir participé et validé la formation </p>
        <h3 class="fw-bolder text-uppercase" style="color: #518ffb;"> {{($enrolment->formation->title) }}</h3>
        <p class=""> du {{ \Carbon\Carbon::parse($enrolment->formation->start_date)->locale('fr')->translatedFormat('d F Y')  }} au {{ \Carbon\Carbon::parse($enrolment->formation->end_date)->locale('fr')->translatedFormat('d F Y')  }} </p>
        <div class="d-flex w-100 justify-content-between px-4">
            <div class="col-8 d-flex align-items-center justify-content-between" style="font-size: 13px;">
                <div class="col-7" style="letter-spacing: 0;">
                    <p class="my-1"><span class="fw-bold">RCCM:</span> RB/ABC/21 A 30023 du 29/04/2021</p>
                    <p class="my-1"><span class="fw-bold">IFU :</span> 2201502745607</p>
                    <p> <span class="fw-bold">Email :</span> clumiaconsulting@gmail.com</p>
                </div>
                <figure class="col-6 m-4" style="letter-spacing: 0;">
                    <img src="{{public_path('/assets/images/qrcode.png')}}" alt="" class="col-3">
                    <figcaption style="font-size: 11px;"> ID : ml47f4cd </figcaption>
                </figure>
            </div>
            <div class="col-4 d-flex flex-column justify-content-between align-items-end"
                 style="letter-spacing: 1px;">
                <p class="fw-bold my-0" style="color: #252525;">Franco-Marie HOUESSOU</p>
                <div class="d-flex align-items-center position-relative">
                    <img src="{{public_path('/assets/images/cachet_lumia.png')}}" alt="" class="mx-5" height="100px" style="rotate: -15deg;">
                    <img src="{{public_path('/assets/images/signature_lumia.png')}}" alt="" class="m-auto position-absolute" height="60px" style="right: -10px;">
                </div>
                <div>
                    <p class="my-0" style="color: #1c1c1c;"> DIRECTEUR GÉNÉRAL </p>
                    <div class="col-5 border border-transparent rounded-circle mb-2 mx-2" style="background-color: #f7df36; padding: 1px;"> </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>

