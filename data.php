<?php
function genererCodeBinaire($perso) {
    return ($perso["lunettes"] === "oui" ? "1" : "0") .
           ($perso["moustache"] === "oui" ? "1" : "0") .
           ($perso["chapeau"] === "oui" ? "1" : "0") .
           ($perso["cheveux"] === "oui" ? "1" : "0") .
           ($perso["boucle d'oreille"] === "oui" ? "1" : "0") .
           ($perso["barbe"] === "oui" ? "1" : "0") .
           ($perso["noeud"] === "oui" ? "1" : "0");
}

$personnages = [
    ["nom" => "pedro", "lunettes" => "non", "moustache" => "non", "chapeau" => "non", "cheveux" => "oui", "boucle d'oreille" => "non", "barbe" => "oui", "noeud" => "non", "image" => "pedro.png"],
    ["nom" => "jordan", "lunettes" => "non", "moustache" => "non", "chapeau" => "non", "cheveux" => "oui", "boucle d'oreille" => "oui", "barbe" => "non", "noeud" => "oui", "image" => "jordan.png"],
    ["nom" => "joris", "lunettes" => "oui", "moustache" => "oui", "chapeau" => "oui", "cheveux" => "oui", "boucle d'oreille" => "oui", "barbe" => "oui", "noeud" => "oui", "image" => "joris.png"],
    ["nom" => "mathieu", "lunettes" => "oui", "moustache" => "non", "chapeau" => "non", "cheveux" => "non", "boucle d'oreille" => "oui", "barbe" => "oui", "noeud" => "non", "image" => "mathieu.png"],
    ["nom" => "marie", "lunettes" => "oui", "moustache" => "non", "chapeau" => "oui", "cheveux" => "non", "boucle d'oreille" => "oui", "barbe" => "non", "noeud" => "oui", "image" => "marie.png"],
    ["nom" => "mysterio", "lunettes" => "oui", "moustache" => "oui", "chapeau" => "oui", "cheveux" => "non", "boucle d'oreille" => "non", "barbe" => "non", "noeud" => "non", "image" => "mysterio.png"],
    ["nom" => "laure", "lunettes" => "non", "moustache" => "non", "chapeau" => "non", "cheveux" => "non", "boucle d'oreille" => "non", "barbe" => "non", "noeud" => "non", "image" => "laure.png"],
    ["nom" => "jacob", "lunettes" => "oui", "moustache" => "oui", "chapeau" => "oui", "cheveux" => "non", "boucle d'oreille" => "non", "barbe" => "oui", "noeud" => "oui", "image" => "jacob.png"],
    ["nom" => "peter", "lunettes" => "non", "moustache" => "non", "chapeau" => "non", "cheveux" => "non", "boucle d'oreille" => "oui", "barbe" => "non", "noeud" => "oui", "image" => "peter.png"],
    ["nom" => "gustavo", "lunettes" => "non", "moustache" => "oui", "chapeau" => "oui", "cheveux" => "oui", "boucle d'oreille" => "non", "barbe" => "non", "noeud" => "non", "image" => "gustavo.png"],
    ["nom" => "woods", "lunettes" => "non", "moustache" => "oui", "chapeau" => "oui", "cheveux" => "non", "boucle d'oreille" => "oui", "barbe" => "oui", "noeud" => "non", "image" => "woods.png"],
    ["nom" => "patrick", "lunettes" => "non", "moustache" => "non", "chapeau" => "oui", "cheveux" => "non", "boucle d'oreille" => "non", "barbe" => "oui", "noeud" => "oui", "image" => "patrick.png"],
    ["nom" => "gustave", "lunettes" => "oui", "moustache" => "oui", "chapeau" => "non", "cheveux" => "oui", "boucle d'oreille" => "oui", "barbe" => "non", "noeud" => "non", "image" => "gustave.png"],
    ["nom" => "kilian", "lunettes" => "oui", "moustache" => "non", "chapeau" => "oui", "cheveux" => "oui", "boucle d'oreille" => "non", "barbe" => "oui", "noeud" => "non", "image" => "kilian.png"],
    ["nom" => "estelle", "lunettes" => "non", "moustache" => "non", "chapeau" => "oui", "cheveux" => "oui", "boucle d'oreille" => "non", "barbe" => "non", "noeud" => "non", "image" => "estelle.png"],
    ["nom" => "elisa", "lunettes" => "oui", "moustache" => "non", "chapeau" => "non", "cheveux" => "oui", "boucle d'oreille" => "non", "barbe" => "non", "noeud" => "oui", "image" => "elisa.png"]
];

// Génération du code binaire pour chaque personnage
foreach ($personnages as &$perso) {
    if (isset($perso["nom"])) {
        $perso["code_binaire"] = genererCodeBinaire($perso);
    }
}

// Supprime la référence pour éviter les bugs inattendus
unset($perso);

?>
