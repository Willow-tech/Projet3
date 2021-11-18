<?php
include("vues/v_sommaire_comptable.php");
$action = $_REQUEST['action'];
$tabVisiteurs = $pdo->getLesVisiteurs();

switch ($action) {
    case "selectionnerFiche": {
        
        include ('vues/v_listeFiche.php');
        break;
    }
    case "voirFiche": {
        $leMois = $_REQUEST['lstMois'];
        $idVisiteur = $_SESSION['ficheVisiteur'];
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        $numAnnee = substr($leMois, 0, 4);
        $numMois = substr($leMois, 4, 2);
        $libEtat = $lesInfosFicheFrais['libetat'];
        $montantValide = $lesInfosFicheFrais['montantvalide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbjustificatifs'];
        $dateModif = $lesInfosFicheFrais['dateModif'];
        $dateModif = dateAnglaisVersFrancais($dateModif);
        include("vues/v_etatFrais2.php");
        break;
    }
    case "misePaiement": {
    	$pdo->misePaiement($idvisiteur);
    	echo 'la fiche à bien été mise en paiement';
    	break;
    }
}
include("vues/v_pied.php");
?>