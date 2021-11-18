<div id="contenu">
    <h2>Validation des Fiches de Frais</h2>
    <h3>Fiche à sélectionner</h3>
    <form action="index.php?uc=validerFrais&action=voirFiche" method="post">
        <p>
            Visiteur sélectionné : <?= $visiteur['prenom'].' '.$visiteur['nom'] ?>
        </p>        
        <p>
     
        <label for="lstMois" accesskey="n">Mois : </label>
        <select id="lstMois" name="lstMois">
            <?php
            foreach ($lesMois as $unMois)
            {
                $mois = $unMois['mois'];
                $numAnnee =  $unMois['numAnnee'];
                $numMois =  $unMois['numMois'];
                if($mois == $moisASelectionner){
                ?>
                <option selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
                <?php 
                }
                else{ ?>
                <option value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
                <?php 
                }
            
            }
           
           ?>    
            
        </select>
        </p>
        <p>
                <input type="submit" value="Valider"/>
        </p>
    </form>