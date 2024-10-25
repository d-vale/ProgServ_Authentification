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
    <?php
    session_start();
    if (isset($_SESSION['email'])) {
        echo "<div class='container mt-5'>";
        echo "<h2 class='text-center'>Bienvenue " . $_SESSION['prenom'] . "</h2>";
        echo "<p class='text-center mt-3'><a href='logout.php' class='btn btn-secondary'>Se déconnecter</a></p>";
        echo "</div>";
    } else {
        echo ' 
        <div class="container text-center mt-5">
            <h1>Bienvenue sur mon site</h1>
            <div class="mt-4">
                <a href="register.php" class="btn btn-primary">Créer compte</a>
                <a href="login.php" class="btn btn-secondary">Login</a>
            </div>
        </div>
        ';
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>