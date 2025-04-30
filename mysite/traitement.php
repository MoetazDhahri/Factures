<?php
    $server = "localhost";
    $utilisateur = "root";
    $motdepasse = "";
    $base = "DS";
    $connexion = new mysqli($server, $utilisateur, $motdepasse, $base);

    if ($connexion->connect_error) {
        die("Connection failed: " . $connexion->connect_error);
    }
    echo "connected successfully";

    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
    } else {
        $nom = '';
    }

    if (isset($_POST['prenom'])) {
        $prenom = $_POST['prenom'];
    } else {
        $prenom = '';
    }

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $email = '';
    }

    if (isset($_POST['age'])) {
        $age = $_POST['age'];
    } else {
        $age = 0;
    }

    if (isset($_POST['montant1'])) {
        $montant1 = $_POST['montant1'];
    } else {
        $montant1 = 0;
    }

    if (isset($_POST['montant2'])) {
        $montant2 = $_POST['montant2'];
    } else {
        $montant2 = 0;
    }

    if (isset($_POST['operation'])) {
        $operation = $_POST['operation'];
    } else {
        $operation = '';
    }

    if ($operation == "1") {
        $resultat = somme($montant1, $montant2);
    } elseif ($operation == "2") {
        $resultat = soustraction($montant1, $montant2);
    } else {
        $resultat = null; 
    }

    echo "<h1>Résultat de l'opération</h1>";
    if ($resultat !== null) {
        echo "<p>Le résultat de l'opération est : $resultat</p>";
    } else {
        echo "<p>Erreur d'opération</p>";
    }

    function somme($montant1, $montant2) {
        return $montant1 + $montant2;
    }

    function soustraction($montant1, $montant2) {
        return $montant1 - $montant2;
    }

    $req = "INSERT INTO `UTILISATEUR`(`nom`, `prenom`, `email`, `age`, `montant1`, `montant2`, `operation`, `resultat`) 
            VALUES ('$nom', '$prenom', '$email', '$age', '$montant1', '$montant2', '$operation', '$resultat' )";
    if ($connexion->query($req) === TRUE) {
        echo "Les données ont été insérées avec succès.";
    } else {
        echo "Error: " . $connexion->error;
    }
    $connexion->close();
?>
