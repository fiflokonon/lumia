<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de paiement</title>
    <style>
        /* Ajoutez ici vos styles CSS pour personnaliser la page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
        }
        .message {
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="{{ asset('/assets/images/logo.png') }}" alt="Logo de la plateforme de formation">
    </div>
    <div class="content">
        <div class="message">
            <h2>Merci pour votre paiement !</h2>
            <p>Votre paiement a été effectué avec succès.</p>
        </div>
        <div class="dashboard-link">
            <p>Pour accéder à votre tableau de bord, veuillez cliquer sur le bouton ci-dessous :</p>
            <a href="{{ route('dashboard') }}" class="button">Accéder au dashboard</a>
        </div>
    </div>
</div>
</body>
</html>
