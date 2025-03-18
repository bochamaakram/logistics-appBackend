<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>supprimer un Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <a href="http://127.0.0.1:8000" class="btn btn-outline-success">Revenir à l'accueil</a>
        <div class="alert alert-success">
        Produit supprimé avec succès.
        </div>
        <a href="{{ route('clients.create') }}" class="btn btn-outline-success">Ajouter un Client</a>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Revenir</a>
    </div>
</body>
</html>