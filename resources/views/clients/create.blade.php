<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Client</title>
    <!-- Add Bootstrap CSS (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5"><a href="http://127.0.0.1:8000" class="btn btn-outline-success">revenir à l' accueil</a>
        <h1 class="mb-4">Ajouter un Client</h1>

        <!-- Display success message if exists -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf

            <!-- Phone Number -->
            <div class="mb-3">
                <label for="tel_client" class="form-label">Num de telePhone</label>
                <input type="text" class="form-control" id="tel_client" name="tel_client" required>
                @error('tel_client')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Client Name -->
            <div class="mb-3">
                <label for="nom_client" class="form-label">Nom Client</label>
                <input type="text" class="form-control" id="nom_client" name="nom_client" required>
                @error('nom_client')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- City -->
            <div class="mb-3">
                <label for="ville" class="form-label">ville de resedese</label>
                <input type="text" class="form-control" id="ville" name="ville" required>
                @error('ville')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Type (Entreprise or Personnel) -->
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="entreprise">Entreprise</option>
                    <option value="personnel">Personnel</option>
                </select>
                @error('type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Add Client</button>
        </form>
    </div>

    <!-- Add Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>