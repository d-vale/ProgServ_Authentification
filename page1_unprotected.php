<?php
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="page1_unprotected.php">Page 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page2_protected.php">Page 2</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container text-center mt-5">
        <h1>Bienvenue sur mon site</h1>
        <div class="mt-4">
            <a href="register.php" class="btn btn-primary">Créer compte</a>
            <a href="page2_unprotected.php" class="btn btn-secondary">Login</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>