<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Modifier Produit</h1>

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
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produits.update', $produit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nome" class="form-label">nome</label>
                <input type="text" step="0.01" class="form-control" id="nome" name="nome" value="{{ $produit->nome }}" required>
            </div>
            <div class="mb-3">
                <label for="poids" class="form-label">Poids (kg)</label>
                <input type="number" step="0.01" class="form-control" id="poids" name="poids" value="{{ $produit->poids }}" required>
            </div>
            <div class="mb-3">
                <label for="hauteur" class="form-label">Hauteur (m)</label>
                <input type="number" step="0.01" class="form-control" id="hauteur" name="hauteur" value="{{ $produit->hauteur }}" required>
            </div>
            <div class="mb-3">
                <label for="largeur" class="form-label">Largeur (m)</label>
                <input type="number" step="0.01" class="form-control" id="largeur" name="largeur" value="{{ $produit->largeur }}" required>
            </div>
            <div class="mb-3">
                <label for="épaisseur" class="form-label">épaisseur (mm)</label>
                <input type="number" step="0.01" class="form-control" id="épaisseur" name="épaisseur" value="{{ $produit->épaisseur }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Revenir</a>
        </form>
    </div>
</body>
</html>