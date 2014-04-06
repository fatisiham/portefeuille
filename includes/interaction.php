<?php
require_once("cnx.php");
//BLOQUE D'INSCRIPTION DES NOUVEAUX UTILISATEURS
if( $_POST["todo"] == "Inscription" )
{
	$erreur = false;
	$StringErreur = "";
	//LOGIN
	if( $_POST["login"] == "" || !preg_match("#^([a-z]|[0-9])*$#i",$_POST["login"]) )
	{
		$erreur = true;
		$StringErreur = "Le login est invalide !\n";
	}
	//PASSWORD
	if( $_POST["password"] == "" || !preg_match("#^([a-z]|[0-9]|.)*$#i",$_POST["password"]) )
	{
		$erreur = true;
		$StringErreur .= "Le mot de passe est invalide !\n";
	}
	//NOM
	if( $_POST["nom"] == "" || !preg_match("#^[a-z]{3,10}$#i",$_POST["nom"]) )
	{
		$erreur = true;
		$StringErreur .= "Le nom est invalide !\n";
	}
	//PRENOM
	if( $_POST["prenom"] == "" || !preg_match("#[a-z]{3,10}$#i",$_POST["prenom"]) )
	{
		$erreur = true;
		$StringErreur .= "Le prenom est invalide !\n";
	}
	//CIN
	if( $_POST["cin"] == "" || !preg_match("#[a-z]{2}[0-9]{5}$#i",$_POST["cin"]) )
	{
		$erreur = true;
		$StringErreur .= "Le CIN est invalide !\n";
	}
	//EMAIL
	if( $_POST["email"] == "" || !preg_match("#^.{2,20}@[a-z]{3,8}\.[a-z]{2,5}$#i",$_POST["email"]) )
	{
		$erreur = true;
		$StringErreur .= "L'adresse mail est invalide !\n";
	}
	//CIVILITE
	if( $_POST["civilite"] == 0)
	{
		$erreur = true;
		$StringErreur .= "Veuillez choisir une civilité correct !\n";
	}
	//ADRESSE
	if( $_POST["adresse"] == "" || !preg_match("#^.{5,50}$#i",$_POST["adresse"]) )
	{
		$erreur = true;
		$StringErreur .= "Adresse invalide !\n";
	}
	//PROFIL
	if( $_POST["profil"] == 0 )
	{
		$erreur = true;
		$StringErreur .= "Veuillez choisir un rôle correct !\n";
	}
	//TELEPHONE
	if( $_POST["telephone"] == "" || !preg_match("#^((\+212[0-9]{9})|[0-9]{10})$#i",$_POST["telephone"]) )
	{
		$erreur = true;
		$StringErreur .= "Telephone invalide !\n";
	}
	//FAX
	if( $_POST["fax"] == "" || !preg_match("#^((\+212[0-9]{9})|[0-9]{10})$#i",$_POST["fax"]) ) 
	{
		$erreur = true;
		$StringErreur .= "Fax invalide !\n";
	}
	//DANS LE CAS OU TOUS LES CHAMPS SONT BIEN REMPLIS
	if($erreur)
	{
		echo $StringErreur;
		exit();
	}
	else if( $erreur == false )
	{
		$requete = $cnx->prepare("SELECT email,login FROM intervenant WHERE email LIKE ? OR login LIKE ?");
		$requete->execute(array($_POST["email"],$_POST["login"]));
		if($requete->rowCount() > 0)
		{
			$erreur = true;
			$StringErreur = "adresse m@il/login existe dèja !";
			echo $StringErreur;
			exit();
		}
	 	$insertion = $cnx->prepare("INSERT INTO intervenant(login,password,profil,nom,prenom,email,num_tel,fax,statut,cin,civilité,adress,date_creation) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,NOW())");
		$insertion->execute(array($_POST["login"],$_POST["password"],$_POST["profil"],$_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["telephone"],$_POST["fax"],"2",$_POST["cin"],$_POST["civilite"],$_POST["adresse"]));
		if( $insertion->rowCount() > 0 )
		{
			$erreur = true;
			$StringErreur = '<p id="succes">Utilisateur ajouté avec succés !</p>';
		}
	 }
		
}
// BLOQUE DE RECHERCHE D'INTERVENANT
else if( $_POST["todo"] == "RechercheUtilisateur" )
{
	$recherche = $cnx->query("SELECT * FROM intervenant WHERE code_intervenant =".$_POST["id"]);
	$data = $recherche->fetch();
	echo $data["statut"].'|'.$data["login"].'|'.$data["password"].'|'.$data["nom"].'|'.$data["prenom"].'|'.$data["email"].'|'.$data["cin"]
	.'|'.$data["civilite"].'|'.$data["adress"].'|'.$data["profil"].$data["num_tel"].'|'.$data["fax"];
	exit();
}
//BLOQUE DESACTIVATION
else if( $_POST["todo"] == "Desactivation" )
{
	$requete = $cnx->exec("UPDATE intervenant SET statut=2 WHERE code_intervenant=".$_POST["id"]);
	if( $requete > 0 )
		echo "L'utilisateur a été désactivé !";
	else
		echo "Erreur !";
}
else if( $_POST["todo"] == "RechercheUtilisateurParNom" )
{
	$requete = $cnx->prepare("SELECT * FROM intervenant WHERE login LIKE ? OR login LIKE ?");
	$requete->execute(array($_POST["login"],$_POST["login"]."%"));
	$out = '<style type="text/css">
			.info
			{
				font-weight:bold;
				font-family:calibri;
			}
			#derniere
			{
				margin-bottom:15px;
			}
			</style>';
	while($data = $requete->fetch() )
	{
		$out .= "Login :<span class='info'>".$data["login"]."</span><br/>"
				."eMail :<span class='info'>".$data["email"]."</span><br/>"
				."Nom :<span class='info'>".$data["nom"]."</span><br/>"
				."Prenom :<span class='info'>".$data["prenom"]."</span><br/>"
				."Adresse :<span class='info'>".$data["adress"]."</span><br/>"
				
				."CIN :<span class='info'>".$data["cin"]."</span><br/>"
				
				."Téléphone :<span class='info'>".$data["num_tel"]."</span><br/>"
				."Fax :<span class='info'>".$data["fax"]."</span><br/>";
		switch($data["profil"])
		{
			case '1':
				$out .= "Profil <span class='info'>Administrateur </span></span><br/>";
				break;
			case '2':
				$out .= "Profil <span class='info'>Proprietaire<br/>";
				break;
			case '3':
				$out .= "Profil <span class='info'>Locataire</span><br/>";
				break;			
		}
		
		switch( $data["statut"])
		{
			case '1':
				$out .= "Statut compte :<span class='info'>Activé</span><br/>";
				break;
			case '2':
				$out .= "Statut compte : <span id=\"derniere\" class='info'>Désactivé</span><br/><br/><br/><br/>";
				break;			
		}
	
	}
	echo $out;
}
else if( $_POST["todo"] == "RechercheRole" || $_POST["todo"] == "RechercheRolePourInput")
{
	$requete = $cnx->prepare("SELECT profil FROM intervenant WHERE code_intervenant = ?");
	$requete->execute(array($_POST["user"]));
	$profil = $requete->fetch();
	switch($profil["profil"])
	{
		case 1:
			$profil["profil"] = "Administrateur";
			break;
		case 2:
			$profil["profil"] = "Chef de projet";
			break;
		case 3:
			$profil["profil"]= "Collaborateur";
			break;
	}
	switch($_POST["todo"])
	{
		case "RechercheRole":
			echo "<p>Profil :<span style=\"font-weight:bold\">".$profil["profil"]."</span></p>";
			break; 
		case "RechercheRolePourInput":
			echo $profil["profil"];
			break;
	}
	
}
else if( $_POST["todo"] == "ModifierUtilisateur")
{	
	try
	{					
		$resultat = $cnx->exec("UPDATE intervenant SET
							nom='".$_POST["nom"]."',
							prenom='".$_POST["prenom"]."',
							login='".$_POST["login"]."',
							password='".$_POST["paswd"]."',
							email='".$_POST["email"]."',
							cin='".$_POST["cin"]."',
							adress='".$_POST["adresse"]."',
							age=".$_POST["age"].",
							num_tel='".$_POST["telephone"]."',
							fax='".$_POST["fax"]."',
							profil=".$_POST["profil"].",
							civilite=".$_POST["civilite"]." 
						   WHERE code_intervenant = ".$_POST["Pour"]);
		if($resultat > 0 )
			echo "Les mises a jour ont été effetué avec succés !";
	}
	catch(exception $e)
	{
		echo "Erreur ".$e->getMessage()." à la ligne ".$e->getLine();
	}
		
}
else if( $_POST["todo"] == "ChangeRole" )
{
	$requete_changement = $cnx->exec("UPDATE intervenant SET profil=".$_POST["NouveauRole"]." WHERE code_intervenant=".$_POST["User"]);
	if($requete_changement > 0)
		echo "Le changement a été pris en compte !";
	else
		echo "Pas de nouveau profil affecté !";
}
?>