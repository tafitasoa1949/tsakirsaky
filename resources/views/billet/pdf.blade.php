<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facture{{ $billet->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .left {
            float: left;
            width: 50%;
        }
        .right {
            float: right;
            width: 50%;
        }
        h4, .rem {
            text-align: center;
        }
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }
        h2{
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>TsakiTsaky Etudiant</h2>
    <div class="clearfix">
        <div class="left">
            <p>Responsable : {{ $billet->user->name }}</p>
            <p>Pack : {{ $billet->pack->nom }}</p>
            <p>Prix unitaire : {{ $billet->pack->prix }} Ar</p>
            <p>Quantite : {{ $billet->quantite }}</p>
        </div>
        <div class="right">
            <p>Client : {{ $billet->client->prenoms }} {{ $billet->client->nom }}</p>
            <p>Telephone : {{ $billet->client->telephone }}</p>
            <p>Adresse : {{ $billet->client->adresse }}</p>
            <p>Livraison : {{ $billet->axe->nom }}</p>
        </div>
    </div>
    <h4>Composition de pack</h4>
    <div>
        <table>
            <thead>
                <th>Produit</th>
                <th>Quantite</th>
            </thead>
            <tbody>
                @foreach ($billet->pack->composition as $compo)
                    <tr>
                        <td>{{ $compo->produit->nom }}</td>
                        <td>{{ $compo->quantite }} ({{ $compo->produit->unite->nom }})</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <h3>Montant a payer : {{ $montant }} Ar</h3>
        <p class="rem">Merci pour votre soutien. Votre aide nous aide à faire mieux</p>
    </div>
</body>
</html>
