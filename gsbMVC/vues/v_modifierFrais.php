<div id="contenu">
    <h3>Fiche de frais du mois <?php echo $numMois."-".$numAnnee." de ".$visiteur["nom"]." ".$visiteur["prenom"]?> : 
    </h3>
    <div class="encadre">
        <p>
            Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?> <br> Montant validé : <?php echo $montantValide?>
        </p>

        <form method="POST" action="index.php?uc=validerFrais&action=validerFiche">
            <div class="corpsForm">
              
                <table class="listeLegere">
                <caption>Eléments forfaitisés </caption>
                <?php
                    foreach ($lesFraisForfait as $unFrais)
                    {
                        $idFrais = $unFrais['idfrais'];
                        $libelle = $unFrais['libelle'];
                        $quantite = $unFrais['quantite'];
                ?>  <tr>
                        <th class="libelle"><?php echo $libelle ?></th>
                        <td><input type="text" id="idFrais" name="lesFrais[<?php echo $idFrais?>]" size="10" maxlength="5" value="<?php echo $quantite?>" /></td>
                    </tr>
                <?php
                    }
                ?>
                </table>

              	<table class="listeLegere">
              	   <caption>Descriptif des éléments hors forfait -<?php echo $nbJustificatifs ?> justificatifs reçus -
                   </caption>
                         <tr>
                            <th class="date">Date</th>
                            <th class="libelle">Libellé</th>
                            <th class='montant'>Montant</th>
                            <th class='refuse'>Refusé</th>                
                         </tr>
                    <?php      
                      foreach ( $lesFraisHorsForfait as $unFraisHorsForfait ) 
            		  {
            			$date = $unFraisHorsForfait['date'];
            			$libelle = $unFraisHorsForfait['libelle'];
            			$montant = $unFraisHorsForfait['montant'];
                        $idligne = $unFraisHorsForfait['id'];
            		?>
                        <tr>
                            <td><input type="text" name="date" value="<?php echo $date; ?>"/></td>
                            <td><input type="text" name="libelle" value="<?php echo $libelle; ?>"/></td>
                            <td><input type="text" name="montant" value="<?php echo $montant; ?>"/></td>
                            <input type="hidden" name="idligne" value="<?php echo $idligne; ?>"/>
                            <td><input type="checkbox" name="refuse" value="refuse"/></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
    <div class="piedForm" >
            <input type='submit' value='Valider'>
    </div>
    </form>    
</div>