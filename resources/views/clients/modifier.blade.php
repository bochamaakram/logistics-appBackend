<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Client</title>
    <!-- Add Bootstrap CSS (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Update Client</h1>

        <!-- Display success message if exists -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Use PUT method for update -->

            <!-- Phone Number -->
            <div class="mb-3">
                <label for="tel_client" class="form-label">Num de telePhone</label>
                <input type="text" class="form-control" id="tel_client" name="tel_client" value="{{ old('tel_client', $client->tel_client) }}" required>
                @error('tel_client')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Client Name -->
            <div class="mb-3">
                <label for="nom_client" class="form-label">Nom Client</label>
                <input type="text" class="form-control" id="nom_client" name="nom_client" value="{{ old('nom_client', $client->nom_client) }}" required>
                @error('nom_client')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- City -->
            <div class="mb-3">
                <label for="ville" class="form-label">ville de resedese</label>
                <input type="text" class="form-control" id="ville" name="ville" value="{{ old('ville', $client->ville) }}" required>
                @error('ville')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Type (Entreprise or Personnel) -->
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="entreprise" {{ old('type', $client->type) == 'entreprise' ? 'selected' : '' }}>Entreprise</option>
                    <option value="personnel" {{ old('type', $client->type) == 'personnel' ? 'selected' : '' }}>Personnel</option>
                </select>
                @error('type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Client</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Revenir</a>
        </form>
    </div>

    <!-- Add Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>