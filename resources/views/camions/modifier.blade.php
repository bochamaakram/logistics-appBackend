<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Camion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Modifier Camion</h1>

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

        <form action="{{ route('camions.update', $camion->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="kilométrage" class="form-label">kilométrage</label>
                <input type="text" class="form-control" id="kilométrage" name="kilométrage" value="{{ $camion->kilométrage }}" required>
            </div>
            <div class="mb-3">
                <label for="poids_max" class="form-label">Poids Max (kg)</label>
                <input type="number" step="0.01" class="form-control" id="poids_max" name="poids_max" value="{{ $camion->poids_max }}" required>
            </div>
            <div class="mb-3">
                <label for="hauteur_max" class="form-label">Hauteur Max (m)</label>
                <input type="number" step="0.01" class="form-control" id="hauteur_max" name="hauteur_max" value="{{ $camion->hauteur_max }}" required>
            </div>
            <div class="mb-3">
                <label for="largeur_max" class="form-label">Largeur Max (m)</label>
                <input type="number" step="0.01" class="form-control" id="largeur_max" name="largeur_max" value="{{ $camion->largeur_max }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Revenir</a>
        </form>
    </div>
</body>
</html>