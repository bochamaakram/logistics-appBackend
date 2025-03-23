<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Livraison</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        // JavaScript to update the phone number when a client is selected
        function updatePhoneNumber() {
            const clientSelect = document.querySelector('select[name="nom_client"]');
            const phoneSelect = document.querySelector('select[name="tel_client"]');
            const selectedClient = clientSelect.value;
            const clients = @json($clients); // Pass clients data to JavaScript

            // Find the selected client and update the phone number
            const selectedClientData = clients.find(client => client.nom_client === selectedClient);
            if (selectedClientData) {
                phoneSelect.value = selectedClientData.tel_client;
            }
        }

        // JavaScript to update the Kilométrage when a truck is selected
        function updateKilometrage() {
            const matriculeSelect = document.querySelector('select[name="Matricule"]');
            const kilometrageInput = document.querySelector('input[name="kilométrage"]');
            const selectedMatricule = matriculeSelect.value;
            const camions = @json($camions); // Pass camions data to JavaScript

            // Find the selected camion and update the kilométrage
            const selectedCamion = camions.find(camion => camion.matrecul === selectedMatricule);
            if (selectedCamion) {
                kilometrageInput.value = selectedCamion.kilométrage;
            }
        }


        // Attach event listeners when the DOM is fully loaded
        document.addEventListener('DOMContentLoaded', function () {
            const clientSelect = document.querySelector('select[name="nom_client"]');
            const produitSelect = document.querySelector('select[name="Produits"]');
            const quantiteInput = document.querySelector('input[name="quantité"]');
            const matriculeSelect = document.querySelector('select[name="Matricule"]');

            clientSelect.addEventListener('change', updatePhoneNumber);
            produitSelect.addEventListener('change', calculatePoidMax);
            quantiteInput.addEventListener('input', calculatePoidMax);
            matriculeSelect.addEventListener('change', updateKilometrage);
        });
    </script>
</head>
<body>
    <div class="container mt-5">
        <!-- Back to Home Button -->
        <a href="http://127.0.0.1:8000" class="btn btn-outline-success">Revenir à l'accueil</a>
        
        <!-- Page Title -->
        <h1 class="mt-3">Ajouter une Livraison</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Message -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('livraison.store') }}" method="POST">
            @csrf

            <!-- Num Command Client -->
            <div class="form-group mb-3">
                <label for="num_command_client">Numéro de Commande Client</label>
                <input type="text" name="num_command_client" class="form-control" value="{{ old('num_command_client') }}" required>
            </div>

            <!-- Num Commande Cami -->
            <div class="form-group mb-3">
                <label for="num_commande_cami">Numéro de Commande Cami</label>
                <input type="text" name="num_commande_cami" class="form-control" value="{{ old('num_commande_cami') }}" required>
            </div>

            <!-- Nom Client (Select Input) -->
            <div class="form-group mb-3">
                <label for="nom_client">Nom du Client</label>
                <select name="nom_client" class="form-control" onchange="updatePhoneNumber()" required>
                    <option value="">Sélectionnez un client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->nom_client }}" {{ old('nom_client') == $client->nom_client ? 'selected' : '' }}>{{ $client->nom_client }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tel Client (Select Input) -->
            <div class="form-group mb-3">
                <label for="tel_client">Téléphone du Client</label>
                <select name="tel_client" class="form-control" required>
                    <option value="">Sélectionnez un téléphone</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->tel_client }}" {{ old('tel_client') == $client->tel_client ? 'selected' : '' }}>{{ $client->tel_client }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Produits (Select Input) -->
            <div class="form-group mb-3">
                <label for="Produits">Produits</label>
                <select name="Produits" class="form-control" onchange="calculatePoidMax()" required>
                    <option value="">Sélectionnez un produit</option>
                    @foreach($produits as $produit)
                        <option value="{{ $produit->nome }}" data-poid="{{ $produit->poid }}" {{ old('Produits') == $produit->nome ? 'selected' : '' }}>{{ $produit->nome }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Ville de Livraison -->
            <div class="form-group mb-3">
                <label for="Ville_de_Livraison">Ville de Livraison</label>
                <input type="text" name="Ville_de_Livraison" class="form-control" value="{{ old('Ville_de_Livraison') }}" required>
            </div>

            <!-- Adresse de Livraison -->
            <div class="form-group mb-3">
                <label for="adresse_de_Livraison">Adresse de Livraison</label>
                <input type="text" name="adresse_de_Livraison" class="form-control" value="{{ old('adresse_de_Livraison') }}" required>
            </div>
            <div class="form-group">
                <label for="Date_de_Livraison">Date de Livraison</label>
                <input type="date" class="form-control" id="Date_de_Livraison" name="Date_de_Livraison" required>
            </div>
            <!-- Quantité -->
            <div class="form-group mb-3">
                <label for="quantité">Quantité</label>
                <input type="number" id="quantité" name="quantité" class="form-control" value="{{ old('quantité') }}" oninput="calculatePoidMax()" required>
            </div>

            <!-- Commercial -->
            <div class="form-group mb-3">
                <label for="commertial">Commercial</label>
                <input type="text" name="commertial" class="form-control" value="{{ old('commertial') }}" required>
            </div>

            <!-- Matricule (Select Input) -->
            <div class="form-group mb-3">
                <label for="Matricule">Matricule</label>
                <select name="Matricule" class="form-control" onchange="updateKilometrage()" required>
                    <option value="">Sélectionnez un matricule</option>
                    @foreach($camions as $camion)
                        <option value="{{ $camion->matrecul }}" {{ old('matrecul') == $camion->matrecul ? 'selected' : '' }}>{{ $camion->matrecul }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Kilométrage -->
            <div class="mb-3">
                <label for="kilométrage" class="form-label">Kilométrage</label>
                <input type="text" class="form-control" id="kilométrage" name="kilométrage" value="{{ old('kilométrage') }}" required>
            </div>

            <!-- Prix Plein (Number Input) -->
            <div class="form-group mb-3">
                <label for="prix_Plein">Gasoil</label>
                <input type="number" name="prix_Plein" class="form-control" value="{{ old('prix_Plein') }}" step="0.01" required>
            </div>

            <!-- Chauffeur (Select Input) -->
            <div class="form-group mb-3">
                <label for="Chauffeur">Chauffeur</label>
                <select name="Chauffeur" class="form-control" required>
                    <option value="">Sélectionnez un chauffeur</option>
                    @foreach($chauffeurs as $chauffeur)
                        <option value="{{ $chauffeur->nom }}" {{ old('Chauffeur') == $chauffeur->nom ? 'selected' : '' }}>{{ $chauffeur->nom }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Remarque -->
            <div class="form-group mb-3">
                <label for="remarque">Remarque</label>
                <textarea name="remarque" class="form-control">{{ old('remarque') }}</textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Ajouter la Livraison</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>