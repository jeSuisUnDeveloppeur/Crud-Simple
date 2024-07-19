<?php
$title = "Modifier un stagiaire";
$css_path = "formulaireModification.css";
ob_start();
?>
<?php 
    $ErrorMsg = "<span>Veuillez saisir un prénom Valide !</span>";
    $error1 = (isset($_GET["nom"]) && empty($_GET["nom"]));
    $error2 = (isset($_GET["prenom"]) && empty($_GET["prenom"]));
    if((isset($_GET["prenom"],$_GET["nom"])) && (!empty($_GET["prenom"])) && (!empty($_GET["nom"]))){
        header("Location:http://localhost/ARCHIMVC_AMORCE/index.php?action=modif&id=$_GET[id]&nom=$_GET[nom]&prenom=$_GET[prenom]");
    }
    $actualName = isset($_GET["id"],$_GET["nomStag"],$_GET["prenomStag"]);
?>

<h1>Modification d'un stagiaire</h1>
<form method="get">
    <div>
        <label for="prenom">Prénom</label>
        <input type="text"id="idPrenom" name="prenom" value="<?= $actualName ? $_GET["prenomStag"]:""?>"/> <?= $error2 ? $ErrorMsg:""?> 
        <label for="nom">Nom</label>
        <input type="text" id="idNom" name = "nom" value="<?= $actualName ? $_GET["nomStag"]:"" ?>"/> <?= $error1 ? $ErrorMsg:""?>
        <input type="hidden" value="<?=$_GET["id"]?>"name="id"/>
        <div>
            <button type="submit">Envoyer</button>
            <button type="submit" formaction="http://localhost/ARCHIMVC_AMORCE/index.php?action=modif&id=$stagiaire[id_membre]&nomStag=$stagiaire[nom_membre]&prenomStag=$stagiaire[login_membre]">Annuler</button>
        </div>
    </div>
</form>

<?php
$content = ob_get_clean();
include "baselayout.php";
?>