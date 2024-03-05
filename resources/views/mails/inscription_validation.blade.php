<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation d'inscription à la formation</title>
    <style>
        /* Ajoutez ici vos styles CSS pour personnaliser l'e-mail */
        body {
            font-family: Arial, sans-serif;
            background-color: #0d1c3b;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 150px;
        }
        .content {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer; /* Ajout du style cursor pointer */
        }
        .button:hover {
            background-color: #0056b3; /* Changement de couleur au survol */
        }
    </style>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="{{ asset('/assets/images/logo.png') }}" alt="Logo de la plateforme de formation">
    </div>
    <div class="content">
        <h2>Validation de votre inscription à la formation</h2>
        <p>Bonjour {{ $enrolment->user->first_name }}  {{ $enrolment->user->last_name }},</p>
        <p>Nous sommes ravis de vous informer que votre inscription à la formation <b>{{ $formation->title }}</b> a été validée avec succès !</p>
        <p>Voici les détails de votre inscription :</p>
        <ul>
            <li><strong>Formation :</strong>{{ $formation->title }}</li>
            <li><strong>Date de début :</strong> {{ $formation->start_date }}</li>
            <li><strong>Date de fin :</strong> {{ $formation->end_date }}</li>
            <li><strong>Prix :</strong>{{ $formation->price }}</li>
        </ul>
        <p><a href="{{ $formation->offical_link }}" class="button" style="color: white">Rejoindre le forum des inscrits</a></p>
        <p>Merci de votre confiance et nous avons hâte de vous accueillir dans notre communauté de formation.</p>
        <p>Cordialement,<br>L'équipe de Lumia Consulting</p>
    </div>
</div>
</body>
</html>

