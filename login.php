<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site - Connexion</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="page1_unprotected.php">Page 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page2_protected.php">Page 2</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Connexion</h2>
        <form action="" method="post" class="mt-4">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
        <div class="text-center mt-3">
            <p>Pas de compte ? <a href="register.php">Créer un compte</a></p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php 
require_once("./config/autoload.php");

if(isset($_POST['email']) && isset($_POST['password'])) {

$email = $_POST['email'];
$password = $_POST['password'];

$db = new PDO("sqlite:db/dbpsw.sqlite", "", "");
$sql = "SELECT * FROM utilisateurs WHERE email = :email AND password = :password";
$stmt = $db->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);

if($stmt->execute()) {
    $result = $stmt->fetchAll();
    if(count($result) > 0) {
        session_start();
        $_SESSION['email'] = $email;
        header("Location: page2_protected.php");
    } else {
        echo "Email ou mot de passe incorrect";
    }
} else {
    echo "Erreur de connexion";
}

}

?>