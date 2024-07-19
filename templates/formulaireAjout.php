<?php
$title = "Ajouter un stagiaire";
$css_path = "formulaireAjout.css";
ob_start();
?>
<?php 
     $ErrorMsg = "<span>Veuillez saisir un prénom Valide !</span>";
     (isset($_GET["nom"]) && empty($_GET["nom"]))?$error = true:$error = false;
     (isset($_GET["prenom"]) && empty($_GET["prenom"]))?$error2 = true:$error2 = false;
     if((isset($_GET["prenom"],$_GET["nom"])) && (!empty($_GET["prenom"])) && (!empty($_GET["nom"]))){
        $_GET["action"] = "ajout";
        header("Location:http://localhost/ARCHIMVC_AMORCE/index.php?action=$_GET[action]&prenom=$_GET[prenom]&nom=$_GET[nom]");
     }
             
?>

<h1>Ajout d'un stagiaire</h1>
<form method="get">
    <div>
        <label for="idPrenom">Prénom</label>
        <input type="text"id="idPrenom" name="prenom"> <?= $error2 ?  $ErrorMsg : "";?>
        <label for="idNom">Nom</label>
        <input type="text" id="idNom" name = "nom"/> <?= $error ? $ErrorMsg : "";?>
        <div>
            <button type="submit">Envoyer</button>
            <button type="submit" formaction="http://localhost/ARCHIMVC_AMORCE/index.php?action=ajout">Annuler</button>
        </div>
    </div>
</form>

<?php
$content = ob_get_clean();
include "baselayout.php";
?>