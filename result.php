<?php
include 'data.php';

// Récupérer les réponses
$reponses = [
    "lunettes" => $_POST['lunettes'] ?? "non",
    "moustache" => $_POST['moustache'] ?? "non",
    "chapeau" => $_POST['chapeau'] ?? "non",
    "cheveux" => $_POST['cheveux'] ?? "non",
    "boucle d'oreille" => $_POST["boucle d'oreille"] ?? "non",
    "barbe" => $_POST['barbe'] ?? "non",
    "noeud" => $_POST['noeud'] ?? "non"
];

// Filtrer les personnages qui correspondent aux réponses
$personnagesRestants = array_filter($personnages, function ($perso) use ($reponses) {
    foreach ($reponses as $caracteristique => $valeur) {
        if ($perso[$caracteristique] !== $valeur) {
            return false;
        }
    }
    return true;
});

// Vérifier si un personnage unique a été trouvé
$personnageTrouve = count($personnagesRestants) === 1 ? array_values($personnagesRestants)[0] : null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat - Qui est-ce ?</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <h1>Qui est-ce ?</h1>

        <div class="grid">
            <?php
            foreach ($personnages as $perso) {
                $image = "images/".$perso['image'];
                $class = ($personnageTrouve && $personnageTrouve['nom'] === $perso['nom']) ? "card selected" : "card";
                echo "<div class='$class'>";
                if (file_exists($image)) {
                    echo "<img src='$image' alt='Personnage'>";
                } else {
                    echo "<p class='error-message'>⚠ Erreur : Image non définie</p>";
                }
                echo "</div>";
            }
            ?>
        </div>

        <p class="error-message">
            <?php 
            if (!$personnageTrouve) {
                echo "<span style='color: red;'>Aucun personnage ne correspond aux critères sélectionnés.</span>";
            } else {
                echo "<span style='color: green;'>Personnage trouvé : " . strtoupper($personnageTrouve['nom']) . "</span>";
            }
            ?>
        </p>

        <button onclick="window.location='index.php';">Cliquez pour rejouer</button>
    </div>

</body>
</html>
