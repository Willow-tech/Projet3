<div id="contenu">
    <h2>Validation des Fiches de Frais</h2>
    <h3>Fiche à sélectionner</h3>
    <form method="post" action="index.php?uc=paiementFrais&action=voirFiche">
        <p>
            <label for="lstFiche" accesskey="n">Fiche validée : </label>
            <select id="lstFiche" name="lstFiche">
                <?php
                foreach ($tabVisiteurs as $unVisiteur) {
                    ?>
                    <option value="<?php echo $unVisiteur['id']; ?>"><?php echo $unVisiteur['prenom'] . " " . $unVisiteur['nom']; ?></option>
                    <?php
                }
                ?>
            </select> 
        </p>        
        <p>
                <input type="submit" value="Valider"/>
        </p>
    </form>