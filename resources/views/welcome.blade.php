<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .menu-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            background-color: #f8f9fa; /* Light background */
        }
        .menu-card {
            width: 100%;
            max-width: 600px;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #ffffff; /* White background */
        }
        .menu-card h1 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2.5rem;
            color: #333; /* Dark text */
        }
        .menu-card .btn {
            width: 100%;
            margin-bottom: 1rem;
            padding: 1rem;
            font-size: 1.2rem;
            border-radius: 10px;
        }
        .menu-card .btn-primary {
            background-color: #0d6efd; /* Bootstrap primary color */
            border: none;
        }
        .menu-card .btn-primary:hover {
            background-color: #0b5ed7; /* Darker shade on hover */
        }
        .menu-card .btn-success {
            background-color: #198754; /* Bootstrap success color */
            border: none;
        }
        .menu-card .btn-success:hover {
            background-color: #157347; /* Darker shade on hover */
        }
        .menu-card .btn-warning {
            background-color: #ffc107; /* Bootstrap warning color */
            border: none;
        }
        .menu-card .btn-warning:hover {
            background-color: #e0a800; /* Darker shade on hover */
        }
    </style>
</head>
<body>
    <div class="menu-container">
        <div class="menu-card">
            <h1>Menu Principal</h1>
            <div class="d-grid gap-3">
                    <a href="{{ route('produits.create') }}" class="btn btn-outline-success">Ajouter un Produit</a>
                    <a href="{{ route('camions.create') }}" class="btn btn-outline-success">Ajouter un Camion</a>
                    <a href="{{ route('chauffeurs.create') }}" class="btn btn-outline-success">Ajouter un Chauffeur</a>
                    <a href="{{ route('clients.create') }}" class="btn btn-outline-success">Ajouter un Client</a>
                    <a href="{{ route('livraison.create') }}" class="btn btn-outline-success">Ajouter une livraison</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>