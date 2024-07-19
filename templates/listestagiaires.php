<?php
$title = "Liste des Stagiaires";
$css_path = "style.css";
ob_start();
?>
<h1>Liste des Stagiaires</h1>
    <table class="montableau">
        <tr>
            <th> ID Membre </th>
            <th> Prénom Membre </th>
            <th> Nom Membre </th>
            <th> Suppression </th>
            <th>Modification</th>
        </tr>
        <?php
            foreach($stagiaires as $stagiaire){
                echo "<tr>";
                echo "<td class='colid'> $stagiaire[id_membre] </td>";
                echo "<td> $stagiaire[login_membre] </td>";
                echo "<td> $stagiaire[nom_membre] </td>";
                echo "<td class='colcenter'><a href='index.php?action=suppr&id=$stagiaire[id_membre]'>Supprimer</a></td>";
                echo "<td class ='colcenter'><a href='index.php?action=modif&id=$stagiaire[id_membre]&nomStag=$stagiaire[nom_membre]&prenomStag=$stagiaire[login_membre]'>Modifier</a></td></tr>";
            }  
        ?>
        <tr><td class ='colcenter' colspan = 5><a id="ajouterStagiaire" href='index.php?action=ajout'>Ajouter</a></td></tr>
        
    </table>
<?php
$content = ob_get_clean();
include "baselayout.php";
?>