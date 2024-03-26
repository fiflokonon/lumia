<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificat de Formation</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css"/>
    <style>
        body {
            font-family: "DejaVu Sans Mono", serif;
        }
        .download-button {
            text-align: center;
        }
    </style>
</head>
<body style="background-color: #d2c1c1;">
<div class="container" >
    <div class="row">
        <div class="col-lg-10 mt-5">
            <div class="card align-items-center m-lg-4 m-1 position-relative" style="background-color: whitesmoke; border: 2px #020202 solid; letter-spacing: 1px;">
                <img src="/assets/images/logo.png" alt="" class="col-3 py-3 m-auto">
                <h2 class="fw-bolder" style="color: #518ffb;"> CERTIFICAT DE COMPÉTENCE </h2>
                <p class="mb-1"> BJ01-SERA-S5-LC-2023 </p>
                <div class="col-1 border border-transparent rounded-circle"
                     style="background-color: #f7df36; padding: 1px;"> </div>
                <p class="my-3"> Ce certificat est attribué à </p>
                <h2>{{ $enrolment->user->last_name }} {{ $enrolment->user->first_name }}</h2>
                <div class="col-5 border border-transparent rounded-circle"
                     style="background-color: #f7df36; padding: 1px;"> </div>
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
                            <img src="/certificates/qr/{{$enrolment->certificate_qr_code_link}}" alt="" class="col-3">
                            <figcaption style="font-size: 11px;"> ID : {{ $enrolment->certificate_id }} </figcaption>
                        </figure>
                    </div>
                    <div class="col-4 d-flex flex-column justify-content-between align-items-end"
                         style="letter-spacing: 1px;">
                        <p class="fw-bold my-0" style="color: #252525;">Franco-Marie HOUESSOU</p>
                        <div class="d-flex align-items-center position-relative">
                            <img src="/assets/images/cachet_lumia.png" alt="" class="mx-5" height="100px" style="rotate: -15deg;">
                            <img src="/assets/images/signature_lumia.png" alt="" class="m-auto position-absolute" height="60px" style="right: -10px;">
                        </div>
                        <div>
                            <p class="my-0" style="color: #1c1c1c;"> DIRECTEUR GÉNÉRAL </p>
                            <div class="col-5 border border-transparent rounded-circle mb-2 mx-2" style="background-color: #f7df36; padding: 1px;"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(auth()->user()->isNotClient() || $enrolment->user_id == auth()->user()->id)
        <div class="col-lg-2 mt-5">
            <div class="download-button">
                <a href="{{ route('download_certificate', $enrolment->id) }}" class="btn btn-primary btn-block w-100 mt-5">Télécharger</a>
            </div>
        </div>
        @endif
    </div>
</div>

</body>
</html>

