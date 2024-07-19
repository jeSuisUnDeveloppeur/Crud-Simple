<?php
require_once 'controller.php';
try{
    
    if (!isset($_GET["action"])) {

        liste_stagiaires();

    }
    else if(isset($_GET["action"])){
        
        if($_GET["action"]=="suppr"){
           
            if(isset($_GET["id"])){

                supprimer_stagiaire($_GET["id"]);
            }
            else{
                throw new Exception("<span style='color:red'>Aucun identifiant de stagiaire envoyé</span>");
            }
        }

        elseif($_GET["action"]=="modif"){
            if(isset($_GET["id"],$_GET["nomStag"],$_GET["prenomStag"])){
            
                $url ="http://localhost/ARCHIMVC_AMORCE/templates/formulaireModification.php?action=modif&id=".$_GET['id']."&nomStag=".$_GET['nomStag']."&prenomStag=".$_GET['prenomStag']."";
                header("Location:$url");
            }

            elseif(isset($_GET["id"],$_GET["nom"],$_GET["prenom"])){
        
                modifier_stagiaire($_GET["id"],$_GET["nom"],$_GET["prenom"]);

            }
            else{
                throw new Exception("<span style='color:red'>Aucun identifiant de stagiaire envoyé</span>");
            }
        }
        elseif($_GET["action"]=="ajout"){
            if(!isset($_GET["nom"],$_GET["prenom"])){
                header('location:templates/formulaireAjout.php');
            }
            elseif(isset($_GET["nom"],$_GET["prenom"])){
                ajouter_stagiaire($_GET["nom"],$_GET["prenom"]);
            }
            else{
                throw new Exception("<span style='color:red'>Aucun identifiant de stagiaire envoyé</span>");
            }
        }


    } else {

        throw new Exception("<h1>Page non trouvée !!!</h1>");
    }

}catch(Exception $e){

    $msgErreur = $e->getMessage();
    echo erreur($msgErreur);
}
?>
