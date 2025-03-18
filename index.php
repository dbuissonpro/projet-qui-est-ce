<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Qui est-ce ?</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <h1>Qui est-ce ?</h1>

        <!-- Conteneur aligné -->
        <div class="game-container">
            <!-- Grille des personnages -->
            <div class="grid">
                <?php
                include 'data.php';
                foreach ($personnages as $perso) {
                    $image = "images/".$perso['image'];
                    echo "<div class='card'>";
                    if (file_exists($image)) {
                        echo "<img src='$image' alt='Personnage'>";
                    } else {
                        echo "<p class='error-message'>⚠ Erreur : Image non définie</p>";
                    }
                    echo "</div>";
                }
                ?>
            </div>

            <!-- Formulaire de sélection -->
            <div class="form-container">
                <form method="POST" action="result.php">
                    <?php
                    $questions = [
                        "lunettes" => "A-t-il des lunettes ?",
                        "moustache" => "A-t-il une moustache ?",
                        "chapeau" => "A-t-il un chapeau ?",
                        "cheveux" => "A-t-il des cheveux ?",
                        "boucle d'oreille" => "A-t-il une boucle d'oreille ?",
                        "barbe" => "A-t-il une barbe ?",
                        "noeud" => "A-t-il un noeud papillon ?"
                    ];

                    foreach ($questions as $cle => $libelle) {
                        echo "<p>$libelle</p>";
                        echo "<input type='radio' name='$cle' value='oui' id='{$cle}_oui'><label for='{$cle}_oui'>Oui</label>";
                        echo "<input type='radio' name='$cle' value='non' id='{$cle}_non'><label for='{$cle}_non'>Non</label><br>";
                    }
                    ?>
                    <br>
                    <input type="submit" value="Cliquez pour avoir la réponse">
                </form>

                <div class="buttons">
                    <button onclick="window.location='index.php';">Cliquez pour rejouer</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
