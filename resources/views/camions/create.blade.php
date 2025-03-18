<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Camion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <a href="http://127.0.0.1:8000" class="btn btn-outline-success">Revenir à l'accueil</a>
        <h1>Ajouter un Camion</h1>

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

        <!-- Form -->
        <form action="{{ route('camions.store') }}" method="POST">
            @csrf

            <!-- Numéro Jawaz -->
            <div class="mb-3">
                <label for="num_jawas" class="form-label">Numéro Jawaz</label>
                <input type="text" class="form-control @error('num_jawas') is-invalid @enderror" id="num_jawas" name="num_jawas" value="{{ old('num_jawas') }}" required>
                @error('num_jawas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Matricule -->
            <div class="mb-3">
                <label for="matrecul" class="form-label">Matricule</label>
                <input type="text" class="form-control @error('matrecul') is-invalid @enderror" id="matrecul" name="matrecul" value="{{ old('matrecul') }}" required>
                @error('matrecul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- kilométrage -->
            <div class="mb-3">
                <label for="kilométrage" class="form-label">kilométrage</label>
                <input type="text" class="form-control @error('kilométrage') is-invalid @enderror" id="kilométrage" name="kilométrage" value="{{ $kilométrage ?? '' }}" required>
                @error('kilométrage')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Poids Max -->
            <div class="mb-3">
                <label for="poids_max" class="form-label">Poids Max (kg)</label>
                <input type="number" step="0.01" class="form-control @error('poids_max') is-invalid @enderror" id="poids_max" name="poids_max" value="{{ old('poids_max') }}" required>
                @error('poids_max')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Hauteur Max -->
            <div class="mb-3">
                <label for="hauteur_max" class="form-label">Hauteur Max (m)</label>
                <input type="number" step="0.01" class="form-control @error('hauteur_max') is-invalid @enderror" id="hauteur_max" name="hauteur_max" value="{{ old('hauteur_max') }}" required>
                @error('hauteur_max')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Largeur Max -->
            <div class="mb-3">
                <label for="largeur_max" class="form-label">Largeur Max (m)</label>
                <input type="number" step="0.01" class="form-control @error('largeur_max') is-invalid @enderror" id="largeur_max" name="largeur_max" value="{{ old('largeur_max') }}" required>
                @error('largeur_max')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
</body>
</html>