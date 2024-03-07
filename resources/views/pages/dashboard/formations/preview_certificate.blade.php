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
            font-family: Arial, sans-serif;
        }
        .certificate {
            width: 700px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #333;
            background-color: #b7ccf5;
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
        .signature img {
            width: 200px;
            height: auto;
        }
        .download-button {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-5">
            <div class="certificate">
                <div class="logo text-center">
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
                <div class="signature text-center">
                    <img src="/assets/images/logo.png" alt="Signature">
                    <p>Signature du Formateur</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5">
            <div class="download-button">
                <label for="format-select">Choisir le format de téléchargement :</label>
                <select id="format-select" class="form-control mb-3">
                    <option value="pdf">PDF</option>
                    <option value="jpeg">JPEG</option>
                    <option value="png">PNG</option>
                </select>
                <button onclick="downloadCertificate()" class="btn btn-primary btn-block w-100">Télécharger</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script>
    function downloadCertificate() {
        // Récupérer la valeur sélectionnée dans le menu déroulant
        var format = document.getElementById("format-select").value;
        // En fonction du format sélectionné, télécharger le certificat dans ce format
        if (format === "pdf") {
            // Code pour télécharger au format PDF
        } else if (format === "jpeg") {
            // Code pour télécharger au format JPEG
        } else if (format === "png") {
            // Code pour télécharger au format PNG
        }
    }
</script>
</body>
</html>

