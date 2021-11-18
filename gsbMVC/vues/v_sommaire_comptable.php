  <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    
        <h2>
    
</h2>
    
      </div>  
        <ul id="menuList">
			<li >
				  Comptable :<br>
				<?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?>
			</li>
           <li class="smenu">
              <a href="index.php?uc=validerFrais&action=selectionnerVisiteur" title="Valider fiche de frais ">Valider fiche de frais</a>
           </li>
           <li class="smenu">
              <a href="index.php?uc=paiementFrais&action=selectionnerFiche" title="Suivre paiement">Suivre paiement</a>
           </li>
 	   <li class="smenu">
              <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
           </li>
         </ul>
        
    </div>
    