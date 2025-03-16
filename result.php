<?php
include 'data.php';

// Sécurisation des données POST et normalisation (suppression des espaces, mise en minuscule)
$reponses = [
    "lunettes" => trim(strtolower($_POST['lunettes'] ?? "non")),
    "moustache" => trim(strtolower($_POST['moustache'] ?? "non")),
    "chapeau" => trim(strtolower($_POST['chapeau'] ?? "non")),
    "cheveux" => trim(strtolower($_POST['cheveux'] ?? "non")),
    "boucle d'oreille" => trim(strtolower($_POST["boucle d'oreille"] ?? "non")),
    "barbe" => trim(strtolower($_POST['barbe'] ?? "non")),
    "noeud" => trim(strtolower($_POST['noeud'] ?? "non"))
];

// Filtrer les personnages qui correspondent aux réponses
$personnagesRestants = array_filter($personnages, function ($perso) use ($reponses) {
    foreach ($reponses as $caracteristique => $valeur) {
        // Vérification si la valeur a été sélectionnée dans le formulaire
        if ($valeur !== "oui" && $valeur !== "non") {
            continue; // Ignore si la réponse n'est pas définie
        }

        // Vérifier si la caractéristique du personnage correspond à la réponse utilisateur
        if (isset($perso[$caracteristique]) && strtolower($perso[$caracteristique]) !== $valeur) {
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
                echo "<img src='$image' alt='Personnage'>";
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
