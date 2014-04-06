<?php
if( isset($_POST["se_connecter"]) )
{
	$erreur = false;
	$StringErreur = "";
	//LOGIN
	if( $_POST["login"] == "" || !preg_match("#^([a-z]|[0-9])*$#i",$_POST["login"]) )
	{
		$erreur = true;
		$StringErreur = "Le login est invalide !<br/>";
	}
	//PASSWORD
	if( $_POST["pswd"] == "" || !preg_match("#^([a-z]|[0-9]|.)*$#i",$_POST["pswd"]) )
	{
		$erreur = true;
		$StringErreur .= "Le mot de passe est invalide !<br/>";
	}
	//PROFIL
	if( $_POST["profil"] == 0 )
	{
		$erreur = true;
		$StringErreur .= "Veuillez choisir un rôle correct !<br/>";
	}
	//NOM
	if( $_POST["nom"] == "" || !preg_match("#^[a-z]{3,10}$#i",$_POST["nom"]) )
	{
		$erreur = true;
		$StringErreur .= "Le nom est invalide !<br/>";
	}
	//PRENOM
	if( $_POST["prenom"] == "" || !preg_match("#[a-z]{3,10}$#i",$_POST["prenom"]) )
	{
		$erreur = true;
		$StringErreur .= "Le prenom est invalide !<br/>";
	}
	//EMAIL
	if( $_POST["email"] == "" || !preg_match("#^.{2,20}@[a-z]{3,8}\.[a-z]{2,5}$#i",$_POST["email"]) )
	{
		$erreur = true;
		$StringErreur .= "L'adresse mail est invalide !<br/>";
	}
	//TELEPHONE
	if( $_POST["telephone"] == "" || !preg_match("#^((\+212[0-9]{9})|[0-9]{10})$#i",$_POST["telephone"]) )
	{
		$erreur = true;
		$StringErreur .= "Telephone invalide !<br/>";
	}
	//FAX
	if( $_POST["fax"] == "" || !preg_match("#^((\+212[0-9]{9})|[0-9]{10})$#i",$_POST["fax"]) ) 
	{
		$erreur = true;
		$StringErreur .= "Fax invalide !<br/>";
	}
	//CIN
	if( $_POST["cin"] == "" || !preg_match("#[a-z]{2}[0-9]{5}$#i",$_POST["cin"]) )
	{
		$erreur = true;
		$StringErreur .= "Le CIN est invalide !<br/>";
	}
	
	//CIVILITE
	if( $_POST["civilite"] == 0)
	{
		$erreur = true;
		$StringErreur .= "Veuillez choisir une civilit&eacute; correct !<br/>";
	}
	//ADRESSE
	if( $_POST["adresse"] == "" || !preg_match("#^.{5,50}$#i",$_POST["adresse"]) )
	{
		$erreur = true;
		$StringErreur .= "Adresse invalide !<br/>";
	}
	
	
	
	
	
	//DANS LE CAS OU TOUS LES CHAMPS SONT BIEN REMPLIS
	if( $erreur == false )
	{
		require_once("includes/cnx.php");
		$requete = $cnx->prepare("SELECT email,login FROM intervenant WHERE email LIKE ? OR login LIKE ?");
		$requete->execute(array($_POST["email"],$_POST["login"]));
		if($requete->rowCount() > 0)
		{
			$erreur = true;
			$StringErreur = "adresse m@il/login existe dèja !";
			goto SortieSi;
		}
	 	$insertion = $cnx->prepare("INSERT INTO intervenant(login,password,profil,nom,prenom,email,num_tel,fax,statut,cin,civilité,adress,date_creation) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,NOW())");
		$insertion->execute(array($_POST["login"],$_POST["pswd"],$_POST["profil"],$_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["telephone"],$_POST["fax"],"2",$_POST["cin"],$_POST["civilite"],$_POST["adresse"]));
		if( $insertion->rowCount() > 0 )
		{
			$erreur = true;
			$StringErreur = '<p id="succes">Utilisateur ajout&eacute; avec succés !</p>'; 
			}
	 }
		
}
SortieSi:
?>

<script type="text/javascript">

alert(<?php echo $StringErreur ?>);

</script>

		



<style type="text/css">
form
{
	width:400px;
	float:left;
	margin-left:125px;
		
}
label
{
	display:block;
	float:left;
	width:150px;
}
input[type=text],input[type=password],select
{
	display:block;
	margin:0px;
	width:200px;
}
input[type=button],input[type=reset]
{
	display:block;
	width:100px;
	float:left;
}
input[type=button]
{
	margin-left:5px;
}
#buttons
{
	width:205px;
	margin:0 auto;
}
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <!--
    Created by Artisteer v3.0.0.41778
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Espace admin</title>
    <meta name="description" content="Description" />
    <meta name="keywords" content="Keywords" />


    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
<link rel="stylesheet" type="text/css" href="l/style.css" />
<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style1.css" />
<link rel="stylesheet" href="style2.css" />
<link rel="stylesheet" href="style3.css" />
<link rel="stylesheet" href="style4.css" />
<link rel="stylesheet" type="text/css" href="input.css" media="screen"/>

<script type="text/javascript" src="l/unitpngfix.js"></script>

   <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>


</head>
<body>
<div id="art-page-background-middle-texture">
<div id="art-main">
    <div class="cleared reset-box"></div>
    <div class="art-header">
        <div class="art-header-clip">
        <div class="art-header-center">
            <div class="art-header-png"></div>
            <div class="art-header-jpeg"></div>
        </div>
        </div>
    <div class="art-header-wrapper">
    <div class="art-header-inner">
        <div class="art-logo">
                 <h1 class="art-logo-name"><a href="./index.html">portefeuille projets</a></h1>
                         <h2 class="art-logo-text">Onep</h2>
                </div>
    </div>
    </div>
    </div>
    <div class="cleared reset-box"></div>
<div class="art-nav">
	<div class="art-nav-l"></div>
	<div class="art-nav-r"></div>
<div class="art-nav-outer">
<div class="art-nav-wrapper">
<div class="art-nav-inner">
	<ul class="art-hmenu">
			<li>
			<a href="./new-page-2.html"><span class="l"></span><span class="r"></span><span class="t">Acceuil</span></a>
		</li>

			<li>
			<a href="./new-page.html" class="active"><span class="l"></span><span class="r"></span><span class="t">Gestion des utilisateurs</span></a>
		</li>	
		
					<li>
			<a href="./gp.php"><span class="l"></span><span class="r"></span><span class="t">Gestion de profil</span></a>
		</li>


		<li>
			<a href="./new-page-2.html"><span class="l"></span><span class="r"></span><span class="t">gestion de projets</span></a>
		</li>
        <li>
			<a href="./new-page-2.html"><span class="l"></span><span class="r"></span><span class="t">D&eacute;connexion</span></a>
		</li>		
	</ul>
</div>
</div>
</div>
</div>
<div class="cleared reset-box"></div>
<div class="art-sheet">
        <div class="art-sheet-tl"></div>
        <div class="art-sheet-tr"></div>
        <div class="art-sheet-bl"></div>
        <div class="art-sheet-br"></div>
        <div class="art-sheet-tc"></div>
        <div class="art-sheet-bc"></div>
        <div class="art-sheet-cl"></div>
        <div class="art-sheet-cr"></div>
        <div class="art-sheet-cc"></div>
        <div class="art-sheet-body">
            <div class="art-content-layout">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell art-sidebar1">
<div class="art-block">
    <div class="art-block-tl"></div>
    <div class="art-block-tr"></div>
    <div class="art-block-bl"></div>
    <div class="art-block-br"></div>
    <div class="art-block-tc"></div>
    <div class="art-block-bc"></div>
    <div class="art-block-cl"></div>
    <div class="art-block-cr"></div>
    <div class="art-block-cc"></div>
    <div class="art-block-body">
                <div class="art-blockheader">
                 
                </div>
                <div class="art-blockcontent">
                    <div class="art-blockcontent-body">
      <div class="left_sidebar">
         
        <div id="left_menu">
            <ul>
             <li><a href="#">Ajouter intervenant</a></li>
             <li><a href="consultation.php">Consulter intervenant</a></li>
             <li><a href="modif.php">Modifier compte</a></li>
             <li><a href="desa.php">D&eacute;sactiver compte</a></li>
             <li><a href="#">Activer un compte</a></li>
            </ul>
        </div> </div>


                <div class="cleared"></div>
                    </div>
                </div>
		<div class="cleared"></div>
    </div>
</div>

                      <div class="cleared"></div>
                    </div>
                    <div class="art-layout-cell art-content">
<div class="art-post">
    <div class="art-post-body">
<div class="art-post-inner art-article">
                                <div class="art-postmetadataheader">
                                        <h2 class="art-postheader">
                    Ajout d'un nouveau compte : 
                                        </h2>
                    <div class="cleared"></div>
                                    </div>
                                <div class="art-postcontent">
<p>
<html lang="fr">
<head>
	<meta charset="utf-8"/>
    <title></title>
    <link rel="stylesheet" type="text/css" href="CSS/inscription.css" media="screen"/>
</head>
<body>
<form action="" method="post">
<label>Login</label><input type="text" id="login" name="login"/><br>
<label>Mot de passe</label><input type="password" id="paswd" name="pswd"/><br>
<label>Profil</label>
<select id="profil" name="profil">
<option value="0">Veuillez choisir un profil</option>
<option value="1">Administrateur</option>
<option value="2">Chef de Projet</option>
<option value="3">Collaborateur </option>
</select>
<br/>
<label>Nom</label><input type="text" id="nom" name="nom"/><br>
<label>Prenom</label><input type="text" id="prenom" name="prenom"/><br>
<label>eMail</label><input type="text" id="email" name="email"/><br>
<label>Telephone</label><input type="text" id="telephone" name="telephone"/><br/>
<label>Fax</label><input type="text" id="fax" name="fax"/><br/>
<label>CIN</label><input type="text" id="cin" name="cin"/><br>
<label>Civilit&eacute;</label><select id="civilite" name="civilite">
<option value="0">Veuillez choisir une civilit&eacute;</option>
<option value="1">Mademoiselle</option>
<option value="2">Madame</option>
<option value="3">Monsieur</option>
</select><br/>
<label>Adresse</label><input type="text" id="adresse" name="adresse"/><br/>
<input type="reset" value="Annuler" id="Annuler" name="Annuler" />
<input type="submit" value="Cr&eacute;er compte" id="se_connecter" name="se_connecter" /><br/>
</form>

</p>
                </div>
                <div class="cleared"></div>
                </div>

		<div class="cleared"></div>
    </div>
</div>

                      <div class="cleared"></div>
                    </div>
                </div>
            </div>
            <div class="cleared"></div>
            <div class="art-footer">
                <div class="art-footer-t"></div>
                <div class="art-footer-b"></div>
                <div class="art-footer-body">
                    <a href="#" class="art-rss-tag-icon" title="RSS"></a>
                            <div class="art-footer-text">
                                

<p>Copyright © 2012. Fatima MARZOUKI.Ecole Sup&eacute;rieure De Technologie</p>


                                                            </div>
                    <div class="cleared"></div>
                </div>
            </div>
    		<div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
    <p class="art-page-footer"><a href="http://www.2createawebsite.com/artisteer">Website Template</a> created with <a href="http://www.2createawebsite.com/artisteer">Artisteer</a>.</p>
    <div class="cleared"></div>
</div>
</div>

</body>
</html>
