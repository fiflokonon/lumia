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
            margin: auto;
            padding: 10px;
        }

    </style>
</head>
<body style="background-color: gainsboro">
    <div>
        <div class="card m-lg-4 m-1 w-100" style="background-color: #ffffff; border: 1px #020202 solid; letter-spacing: 1px;">
            <img src="{{public_path('/assets/images/logo.png')}}" width="50" alt="" class="col-3"
                 style="margin-left: 350px;">
            <h2 class="fw-bolder" style="color: #518ffb; margin-left: 250px; font-size: 35px;"> CERTIFICAT DE
                COMPÉTENCE </h2>
            <p class="mb-1 text-center"> BJ01-SERA-S5-LC-2023 </p>
            <div class="col-1 border border-transparent rounded-circle"
                 style="background-color: #f7df36; padding: 1px; margin-left: 450px;"></div>
            <p class="my-3 text-center"> Ce certificat est attribué à </p>
            <h2 style="" class="text-center">{{ $enrolment->user->last_name }} {{ $enrolment->user->first_name }}</h2>
        <div class="col-5 border border-transparent rounded-circle" style="background-color: #f7df36; padding: 1px; margin-left: 250px"> </div>
            <p class="my-2 text-center"> Pour avoir participé et validé la formation </p>
            <h3 class="fw-bolder text-uppercase text-center" style="color: #518ffb; font-size: 30px;"> {{($enrolment->formation->title) }}</h3>
            <div class="text-center" style="margin-bottom: 30px;">
                du {{ \Carbon\Carbon::parse($enrolment->formation->start_date)->locale('fr')->translatedFormat('d F Y')  }}
                au {{ \Carbon\Carbon::parse($enrolment->formation->end_date)->locale('fr')->translatedFormat('d F Y')  }} </div>
            <div style="margin-top: 100px !important;">
                <div style="margin-left: -25px; font-size: 15px;">
                    <ul style="text-decoration: none; list-style: none">
                        <li class="my-1"><span class="fw-bold">RCCM:</span> RB/ABC/21 A 30023 du 29/04/2021</li>
                        <li class="my-1"><span class="fw-bold">IFU :</span> 2201502745607</li>
                        <li><span class="fw-bold">Email :</span> clumiaconsulting@gmail.com</li>
                    </ul>
                </div>
                <div style="position: fixed; top: 520px; left: 450px; width: 150px;">
                    <figure style="letter-spacing: 0; margin-top: 10px;">
                        <img src="{{public_path('/assets/images/qrcode.png')}}" style="width: 90px; height: 90px;" alt="">
                        <figcaption style="font-size: 11px;"> ID : ml47f4cd</figcaption>
                    </figure>
                </div>
                <div style="position: fixed; top: 480px; left: 700px;">
                    <div><p class="fw-bold my-0 mb-2" style="color: #252525;">Franco-Marie HOUESSOU</p></div>
                    <img src="{{public_path('/assets/images/cachet_lumia.png')}}" alt="" class="mx-5" height="100px" style="rotate: -15deg;">
                    <img src="{{public_path('/assets/images/signature_lumia.png')}}" alt="" class="m-auto position-absolute" height="60px" style="right: 120px; top: 50px;">
                    <p class="my-0" style="color: #1c1c1c;"> DIRECTEUR GÉNÉRAL </p>
                    <div class="col-5 border border-transparent rounded-circle mb-2 mx-2" style="background-color: #f7df36; padding: 1px;"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

