<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <a href="http://127.0.0.1:8000" class="btn btn-outline-success">Revenir à l'accueil</a>
        <h1>Ajouter un Produit</h1>

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
        <form action="{{ route('produits.store') }}" method="POST">
            @csrf


            <!-- nome -->
            <div class="mb-3">
                <label for="nome" class="form-label">nome de produit</label>
                <input type="text" step="0.01" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome') }}" required>
                @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Poids -->
            <div class="mb-3">
                <label for="poids" class="form-label">Poids (kg)</label>
                <input type="number" step="0.01" class="form-control @error('poids') is-invalid @enderror" id="poids" name="poids" value="{{ old('poids') }}" required>
                @error('poids')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Hauteur -->
            <div class="mb-3">
                <label for="hauteur" class="form-label">Hauteur (m)</label>
                <input type="number" step="0.01" class="form-control @error('hauteur') is-invalid @enderror" id="hauteur" name="hauteur" value="{{ old('hauteur') }}" required>
                @error('hauteur')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Largeur -->
            <div class="mb-3">
                <label for="largeur" class="form-label">Largeur (m)</label>
                <input type="number" step="0.01" class="form-control @error('largeur') is-invalid @enderror" id="largeur" name="largeur" value="{{ old('largeur') }}" required>
                @error('largeur')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <!-- épaisseur -->
            <div class="mb-3">
                <label for="épaisseur" class="form-label">épaisseur (mm)</label>
                <input type="number" step="0.01" class="form-control @error('épaisseur') is-invalid @enderror" id="épaisseur" name="épaisseur" value="{{ old('épaisseur') }}" required>
                @error('épaisseur')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
</body>
</html>