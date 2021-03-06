<?php
include("vues/v_sommaire_comptable.php");
$action = $_REQUEST['action'];
$tabVisiteurs = $pdo->getLesVisiteurs();

switch ($action) {
    case "selectionnerVisiteur": {
        include ('vues/v_listeVisiteur.php');
        break;
    }
    case "selectionnerMois": {
        $idVisiteur = $_POST['lstVisiteur'];
        $_SESSION['ficheVisiteur'] = $idVisiteur; 
        $lesMois=$pdo->getLesMoisDisponibles($idVisiteur, 'CL');
        $visiteur=$pdo->getVisiteur($idVisiteur);
        include ('vues/v_selectionnerMois.php');
        break;
    }
    case "voirFiche": {
        $leMois = $_REQUEST['lstMois'];
        $idVisiteur = $_SESSION['ficheVisiteur'];
        $_SESSION['ficheMois']=$leMois;
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
    case "modifierFiche": { 
        $leMois = $_SESSION['ficheMois'];
        $idVisiteur = $_SESSION['ficheVisiteur'];
        $visiteur = $pdo->getVisiteur($idVisiteur);
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
        include("vues/v_modifierFrais.php");
        break;
    }
    case "validerFiche": {
        $leMois = $_SESSION['ficheMois'];
        $idVisiteur = $_SESSION['ficheVisiteur'];
        if (isset($_POST['refuse']) && $_POST['refuse']=='refuse'){
            $pdo->changeLibelle($idVisiteur,$leMois, $_POST['idligne']);
        }
        $pdo->modifierFrais($idVisiteur, $leMois, $_POST['quantite']);
        $pdo->modifierFraisHorsForfait($idVisiteur, $leMois, $_POST['libelle'], $_POST['date'], $_POST['montant']);
        $pdo->validerFiche($idVisiteur, $leMois);
        echo 'La fiche ?? bien ??t?? valid??e';
    }
}
include("vues/v_pied.php");
?>