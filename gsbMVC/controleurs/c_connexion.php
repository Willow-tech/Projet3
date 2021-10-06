<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'profession';
}
$action = $_REQUEST['action'];
switch($action){
	case 'profession':{
		include("vues/v_profession.php");
		break;
	}
	case 'demandeConnexion':{
		$profession=$_REQUEST['profession'];
		if($_POST['profession']=='compta'){
			$profession='compta';	
		}
		else{
			$profession='visiteur';
		}
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
		$profession=$_REQUEST['profession'];
		if($_POST['profession']=='compta'){
			$comptable = $pdo->getInfosComptable($login,$mdp);
			if(!is_array( $comptable)){
				ajouterErreur("Login ou mot de passe incorrect");
				include("vues/v_erreurs.php");
				include("vues/v_connexion.php");
			}
			else{
				$id = $comptable['id'];
				$nom =  $comptable['nom'];
				$prenom = $comptable['prenom'];
				connecter($id,$nom,$prenom,$profession);
				include("vues/v_sommaire_comptable.php");
			}
		}
		else{
			$visiteur = $pdo->getInfosVisiteur($login,$mdp);
			if(!is_array( $visiteur)){
				ajouterErreur("Login ou mot de passe incorrect");
				include("vues/v_erreurs.php");
				include("vues/v_connexion.php");
			}
			else{
				$id = $visiteur['id'];
				$nom =  $visiteur['nom'];
				$prenom = $visiteur['prenom'];
				connecter($id,$nom,$prenom,$profession);
				include("vues/v_sommaire.php");
			}
		}
		
		break;
	}
	case 'deconnexion':
		deconnecter();
		include("vues/v_profession.php");
		break;
	default :{
		include("vues/v_profession.php");
		break;
	}
}
?>