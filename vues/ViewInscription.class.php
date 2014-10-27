
<?php
	


    class ViewInscription{
	
         
        
        public static function afficherAjouterUtilisateur( $sMsg=""){
      	// echo 'get s'.$_GET['s'];
        echo'<article class="col-md-5 col-md-offset-3 moduleUtilisateur">';
        echo "
            <p>".$sMsg."</p>
            	<form action=\"index.php?s=".$_GET['s']."\" method=\"post\">
					<fieldset>
						<legend>Inscription</legend> 
						<div class=\"form-group\">
							<label for=\"exampleInputNom1\">Nom</label>
							<input type=\"text\"  class=\"form-control\" name=\"txtNom\" placeholder=\"nom\">
						</div>
						<div class=\"form-group\">
							<label for=\"exampleInputEmail1\">Courriel électronique</label>
							<input type\"email\" class=\"form-control\" id=\"exampleInputEmail1\"  name=\"txtCourriel\" placeholder=\"Courriel électronique\">
						</div>
						<div class=\"form-group\">
							<label for=\"exampleInputPassword1\">Mot de Passe</label>
							<input type=\"password\" class=\"form-control\" id=\"exampleInputPassword1\"  name=\"txtPass\" placeholder=\"Mot de passe\">
						</div>
						<div class=\"form-group\">
							<label for=\"exampleInputPassword1\"> Confirmation Mot de Passe</label>
							<input type=\"password\" class=\"form-control\" id=\"exampleInputPassword11\" name=\"txtPassConfirm\"  placeholder=\"Confirmation mot de passe\">
						</div>
						<!--<div class=\"form-group\">
							<label for=\"exampleInputFile\">Avatar</label>
							<input type=\"file\" id=\"exampleInputFile\">
						</div>-->
						<button type=\"submit\" name=\"cmd\" value=\"inscription\">Créer un compte</button>
					</fieldset>	
					
				</form>
			</article>
		
		  ";
		}
        
        
/*----------------------------------------------------------------------------------------------------------------------------------*/        
         
        public static function afficherConnexionUtilisateur( $sMsg=""){
        echo'<article class="col-md-5 col-md-offset-3 moduleUtilisateur">';
        echo "
            <p>".$sMsg."</p>
        
        		<form action=\"index.php?s=".$_GET['s']."\" method=\"post\">
					<fieldset>
						<legend>Connexion</legend> 

						<div class=\"form-group\">
							<label for=\"exampleInputEmail1\">Courriel électronique</label>
							<input type=\"email\" class=\"form-control\" id=\"exampleInputEmail1\" placeholder=\"Courriel électronique\"  name=\"txtCourriel\">
						</div>
						<div class=\"form-group\">
							<label for=\"exampleInputPassword1\">Mot de Passe</label>
							<input type=\"password\" class=\"form-control\"  placeholder=\"mot de passe\"  name=\"txtPass\">
						</div>
					</fieldset>	
               
					<button type=\"submit\" class=\"btn btn-default\" name=\"cmd\" value=\"connecter\">Se connecter</button>	
					<div class=\"auser\">
						<a href=\"mdpOublier.html\">Mot de passe oublié ? </a>
					</div>
				</form>
			</article>
            ";
        }
        
  /*--------------------------------------------------------------------------------------------------------------------------*/      
        
   public static function afficherListeUtilisateurs(array $aUtilisateurs , $sMsg="&nbsp;"){
			//var_dump($aUtilisateurs);
			
			echo "
				<h1>Liste des Utilisateurs  <a href=\"index.php?s=".$_GET['s']."&action=add\">Ajouter <img src=\"../core/img/ajouter.png\" width=\"25\" height=\"25\"></a> </h1>
				<p>".$sMsg."</p>";
				if(empty($aUtilisateurs)!=true){
					echo 
						"
						<table >
							<tr>
                                <th>Nom</th>
                                <th>Courriel</th>
                                <th>mot de passe </th>
                                <th>Status</th>
                                <th>Type Utilisateur</th>
                                <th>Avatar</th>
                            </tr>
						";
                   for($iEnrg = 0; $iEnrg<count($aUtilisateurs); $iEnrg++){
						echo "
					   <tr>
                            <th> ".$aUtilisateurs[$iEnrg]->getNom()." </th>
                            <th>".$aUtilisateurs[$iEnrg]->getCourriel()." </th>
                            <th>".$aUtilisateurs[$iEnrg]->getMotDePasse()." </th>
                            <th>".$aUtilisateurs[$iEnrg]->getStatus()." </th>
                            <th>".$aUtilisateurs[$iEnrg]->getTypeUtilisateur()." </th>
                            <th>".$aUtilisateurs[$iEnrg]->getAvatar()." </th>
                           <th><a href=\"index.php?s=".$_GET['s']."&action=mod&iUtilisateur=".$aUtilisateurs[$iEnrg]->getIdUtilisateur()."\"><img src=\"../core/img/modifier.png\" width=\"25\" height=\"25\"></a></th>
						<th><a href=\"#\" onclick=\"supprimerUnUtilisateur('Voulez-vous supprimer ce Utilisateurt', ".$_GET['s'].", 'sup',".$aUtilisateurs[$iEnrg]->getIdUtilisateur().")\"><img src=\"../core/img/supprimer.png\" width=\"25\" height=\"25\"></a> </th></tr>
					";
                    }
					echo '</table>';
					}else{
						echo '<p>Aucun utilisateur n’est disponible à l’heure actuelle. Vous pouvez en ajouter un.</p>';
				    }
					
		}
        
        
  /*---------------------------------------------------------------------------------*/
        
        
        public static function afficherModifierUtilisateurAdmin(Utilisateur $oUtilisateur, $sMsg=""){
			echo "
				<p>".$sMsg."</p>
				<form action=\"index.php?s=".$_GET['s']."&action=".$_GET['action']."&idUtilisateur=".$oUtilisateur->getIdUtilisateur()."\" method=\"post\">
					<fieldset>
						<legend>Produit</legend>
						<input type=\"hidden\" name=\"iUtilisateur\" value=\"".$oUtilisateur->getIdUtilisateur()."\" ><br>
						<label for=\"nom\">Nom</label><input type=\"text\" name=\"txtNom\"  value=\"".$oUtilisateur->getNom()."\" ><br>
						
                        <label for=\"TypeUtilisateur\">Type Utilisateur</label><input type=\"text\" name=\"txtType\"  value=\"".$oUtilisateur->getTypeUtilisateur()."\" ><br>
                         <label for=\"Status\">Statut</label><input type=\"text\" name=\"txtStatus\"  value=\"".$oUtilisateur->getStatus()."\" ><br>
												
						<input type=\"submit\" name=\"cmd\" value=\"Enregistrer\" > <a href=\"index.php?s=".$_GET['s']."\">Retour</a>
					</fieldset>
				</form>
			";
		}
        
        
        
 /*------------------------------------------------------------------------------------------------------------*/
  public static function afficherAjouterUtilisateurAdmin($sMsg=""){
			
			$oUtilisateur = new Utilisateur();
          //  var_dump($oProduit);
			      
        echo'<article class="col-md-5 col-md-offset-3 moduleUtilisateur">';
        echo "
            <p>".$sMsg."</p>
            <form action=\"index.php?s=".$_GET['s']."&action=".$_GET['action']."&idUtilisateur=".$oUtilisateur->getIdUtilisateur()."\" method=\"post\">
				<fieldset>
					<legend>Inscription</legend> 
					<div class=\"form-group\">
								<label for=\"exampleInputNom1\">Nom</label>
								<input type=\"text\"  name=\"txtNom\" placeholder=\"nom\">
					</div>
					<div class=\"form-group\">
						<label for=\"exampleInputEmail1\">Courriel électronique</label>
						<input type\"email\" class=\"form-control\" id=\"exampleInputEmail1\"  name=\"txtCourriel\" placeholder=\"Courriel électronique\">
					</div>
					<div class=\"form-group\">
						<label for=\"exampleInputPassword1\">Mot de Passe</label>
						<input type=\"password\" class=\"form-control\" id=\"exampleInputPassword1\"  name=\"txtPass\" placeholder=\"Mot de passe\">
					</div>
					<div class=\"form-group\">
						<label for=\"exampleInputPassword1\"> Confirmation Mot de Passe</label>
						<input type=\"password\" class=\"form-control\" id=\"exampleInputPassword11\" name=\"txtPassConfirm\"  placeholder=\"Confirmation mot de passe\">
					</div>
					<!--<div class=\"form-group\">
						<label for=\"exampleInputFile\">Avatar</label>
						<input type=\"file\" id=\"exampleInputFile\">
					</div>-->
					
				</fieldset>	
				<button type=\"submit\" name=\"cmd\" value=\"inscription\">Créer un compte</button>
			</form></article>
		
		  ";
		}
          
    
    
        
        
        
        
    }

?>