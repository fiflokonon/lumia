<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificat de Formation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .certificate {
            width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #333;
            background-color: #b7ccf5;
        }
        .logo {
            text-align: center;
        }
        .logo img {
            width: 150px;
            height: auto;
        }
        .title {
            text-align: center;
            margin-top: 20px;
        }
        .participant-info {
            text-align: justify;
            margin-top: 30px;
            margin-left: 50px;
        }
        .participant-info p {
            margin-bottom: 5px;
        }
        .signature {
            margin-top: 50px;
            text-align: center;
        }
        .signature img {
            width: 200px;
            height: auto;
        }
    </style>
</head>
<body>
<div class="certificate">
    <div class="logo">
        <img src="/assets/images/logo.png" alt="Company Logo">
    </div>
    <div class="title">
        <h2>Certificat de Formation</h2>
    </div>
    <div class="participant-info">
        <p><strong>Nom du Participant:</strong> {{ $enrolment->user->first_name }} {{ $enrolment->user->last_name }}</p>
        <p><strong>Formation:</strong> {{ $enrolment->formation->title }}</p>
        <p><strong>Date de Début:</strong> {{ \Carbon\Carbon::parse($enrolment->formation->start_date)->locale('fr')->translatedFormat('d F Y')  }}</p>
        <p><strong>Date de Fin:</strong> {{ \Carbon\Carbon::parse($enrolment->formation->end_date)->locale('fr')->translatedFormat('d F Y')  }}</p>
    </div>
    <div class="signature">
        <img src="/assets/images/logo.png" alt="Signature">
        <p>Signature du Formateur</p>
    </div>
</div>
</body>
</html>

