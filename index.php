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

        <div class="grid">
            <?php
            include 'data.php';
            foreach ($personnages as $perso) {
                $image = "images/".$perso['image'];
                echo "<div class='card'>";
                echo "<img src='$image' alt='Personnage'>";
                echo "</div>";
            }
            ?>
        </div>

        <form method="POST" action="result.php">
            <?php
            $questions = [
                "lunettes" => "des Lunettes",
                "moustache" => "une Moustache",
                "chapeau" => "un Chapeau",
                "cheveux" => "des Cheveux",
                "boucle d'oreille" => "une Boucle d'oreille",
                "barbe" => "une Barbe",
                "noeud" => "un Noeud papillon"
            ];

            foreach ($questions as $cle => $libelle) {
                echo "<p>A-t-il $libelle ?</p>";
                echo "<input type='radio' name='$cle' value='oui' id='{$cle}_oui'><label for='{$cle}_oui'> Oui</label> ";
                echo "<input type='radio' name='$cle' value='non' id='{$cle}_non'><label for='{$cle}_non'> Non</label><br>";
            }
            ?>
            <br>
            <input type="submit" value="Cliquez pour avoir la réponse">
        </form>

        <button onclick="window.location='index.php';">Cliquez pour rejouer</button>
    </div>

</body>
</html>
