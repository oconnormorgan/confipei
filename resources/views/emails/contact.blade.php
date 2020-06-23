<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <div class="container">
        <h1 class="d-flex justify-center">
            ConfiPéi vous remercie de passer commande chez nous!
        </h1>
    </div>
    <div class="card">
        <div class="row">
            <h2>Bonjour {{ $contact['prenom'] }} {{ $contact['nom'] }}</h2>
        </div>
        <div class="row">
            <h3>N° de facture: ...
                <small>( Veuillez garder une copie de ce reçu pour référence.)</small>
            </h3>
        </div>
        <div class="row">

        <h4>Votre Commande :</h4>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Quantite</th>
                    <th>Prix</th>
                    <th>Prix total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($contact['commande']->confitures as $commande)
                    <td>{{ $commande['intitule'] }}</td>
                    <td>{{ $commande['quantite'] }}</td>
                    <td>{{ $commande['prix'] }}</td>
                    @endforeach
                </tr>

            </tbody>

            Addresse de Facturation :
            {{ $contact['commande']->adresseFacturation['numero'] }}
            {{ $contact['commande']->adresseFacturation['adresse'] }}
            {{ $contact['commande']->adresseFacturation['code_postal'] }}
            {{ $contact['commande']->adresseFacturation['ville'] }}
            {{ $contact['commande']->adresseFacturation['pays'] }}

            Addresse de Livraison :
            {{ $contact['commande']->adresseLivraison['numero'] }}
            {{ $contact['commande']->adresseLivraison['adresse'] }}
            {{ $contact['commande']->adresseLivraison['code_postal'] }}
            {{ $contact['commande']->adresseLivraison['ville'] }}
            {{ $contact['commande']->adresseLivraison['pays'] }}
        </div>
    </div>
</body>

</html>