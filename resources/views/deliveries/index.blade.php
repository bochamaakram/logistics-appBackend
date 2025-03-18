<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Delivery Report</h1>

        <!-- Livraisons per Chauffeur -->
        <h2>Livraisons per Chauffeur (This Month)</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Chauffeur</th>
                    <th>Total Livraisons</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livraisonsPerChauffeur as $livraison)
                    <tr>
                        <td>{{ $livraison->Chauffeur }}</td>
                        <td>{{ $livraison->Total_Livraisons }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Livraisons per Camion -->
        <h2>Livraisons per Camion (This Month)</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Camion (Matricule)</th>
                    <th>Total Livraisons</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livraisonsPerCamion as $livraison)
                    <tr>
                        <td>{{ $livraison->Matricule }}</td>
                        <td>{{ $livraison->Total_Livraisons }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Most Repeated Camions -->
        <h2>Most Repeated Camions</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Camion (Matricule)</th>
                    <th>Total Livraisons</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mostRepeatedCamions as $camion)
                    <tr>
                        <td>{{ $camion->Matricule }}</td>
                        <td>{{ $camion->Total_Livraisons }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Most Repeated Chauffeurs -->
        <h2>Most Repeated Chauffeurs</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Chauffeur</th>
                    <th>Total Livraisons</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mostRepeatedChauffeurs as $chauffeur)
                    <tr>
                        <td>{{ $chauffeur->Chauffeur }}</td>
                        <td>{{ $chauffeur->Total_Livraisons }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Most Repeated Clients -->
        <h2>Most Repeated Clients</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Total Livraisons</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mostRepeatedClients as $client)
                    <tr>
                        <td>{{ $client->nom_client }}</td>
                        <td>{{ $client->Total_Livraisons }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Most Repeated Produits -->
        <h2>Most Repeated Produits</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Total Livraisons</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mostRepeatedProduits as $produit)
                    <tr>
                        <td>{{ $produit->Produits }}</td>
                        <td>{{ $produit->Total_Livraisons }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>