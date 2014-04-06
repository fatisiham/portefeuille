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
input[type=radio]
{
	position:relative;
	display:inline;
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
<script type="text/javascript">
var infos;
$(init);
function init()
{
	$("#valider").click(
	function()
	{
			var change = false;
			var civilite = document.getElementById("civilite");
			if( $("#login").val() != infos[1] || $("#paswd").val() != infos[2] || $("#nom").val() != infos[3] ||
				$("#prenom").val() != infos[4] || $("#email").val() != infos[5] || $("#cin").val() != infos[6] ||
				$("#adresse").val() != infos[8] || $("#telephone").val() != infos[12] ||
				$("#fax").val() != infos[13] ||
				$("#profil").val() != infos[9] || $("#civilite").val() != infos[7] )
				change = true;
		if(change == true)
		{
			$.post("includes/interaction.php",
				 	{	"todo":"ModifierUtilisateur",
						"Pour":$("#list_users").val(),
						"login":$("#login").val(),
						"paswd":$("#paswd").val(),
						"nom":$("#nom").val(),
						"prenom":$("#prenom").val(),
						"email":$("#email").val(),
						"cin":$("#cin").val(),
						"adresse":$("#adresse").val(),
						
						"telephone":$("#telephone").val(),
						"fax":$("#fax").val(),
						
						
						"profil":$("#profil").val(),
						"civilite":$("#civilite").val()},
						function(data)
						{
							alert(data);
							$('#form_modif').each (function(){
  									this.reset();});
						});
		}
		else
			alert("Aucune mise à jour a appliqué !");		
	});
	
	$("#list_users").change(
	function()
	{
		$.post("includes/interaction.php",{"todo":"RechercheUtilisateur","id":$("#list_users").val()},
		function(data)
		{
			
			var profil = document.getElementById("profil");
			var civilite = document.getElementById("civilite");
			infos = data.split('|');
			$("#login").val(infos[1]);
			$("#paswd").val(infos[2]);
			$("#nom").val(infos[3]);
			$("#prenom").val(infos[4]);
			$("#email").val(infos[5]);
			$("#cin").val(infos[6]);
			$("#adresse").val(infos[8]);
			
			$("#telephone").val(infos[12]);
			$("#fax").val(infos[13]);
			
			
			for(var i=0;i<profil.length;i++)
			{
				if( profil.options[i].value == infos[9] )
						profil.options[i].selected = true;
				if( civilite.options[i].value == infos[7] )
						civilite.options[i].selected = true;
		    }
		});
	});
	//-----------------------------------------------------------------------------------------------------------
}
</script>

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
			<a href="./new-page-2.html"><span class="l"></span><span class="r"></span><span class="t">Gestion de profil</span></a>
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
            <li><a href="aj uti.php">Ajouter intervenant</a></li>
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
                    Modifier un compte : 
                                        </h2>
                    <div class="cleared"></div>
                                    </div>
                                <div class="art-postcontent">

<p>
<form>
<form id="form_modif">
<label>Liste utilisateurs</label><select id="list_users">
<option value="Vide">Veuillez choisir un utilisateur</option>
<?php
require_once("includes/cnx.php");
$requete = $cnx->query("SELECT code_intervenant ID,login FROM intervenant");
while( $data = $requete->fetch() )
	echo '<option value="'.$data["ID"].'">'.$data["login"].'</option>';
?>
</select><br/>
<label>Login</label><input type="text" id="login" name="login"/><br>
<label>Mot de passe</label><input type="password" id="paswd" name="pswd"/><br/>
<label>Nom</label><input type="text" id="nom" name="nom"/><br>
<label>Prenom</label><input type="text" id="prenom" name="prenom"/><br>
<label>eMail</label><input type="text" id="email" name="email"/><br>
<label>CIN</label><input type="text" id="cin" name="cin"/><br>
<label>Civilité</label><select id="civilite" name="civilite">
<option value="vide">Veuillez choisir un utilisateur</option>
<option value="1">Mademoiselle</option>
<option value="2">Madame</option>
<option value="3">Monsieur</option>
</select><br/>
<label>Adresse</label><input type="text" id="adresse" name="adresse"/><br/>
<label>Profil</label>
<select id="profil" name="profil">
<option value="vide">Veuillez choisir un utilisateur</option>
<option value="1">Administrateur</option>
<option value="2">Chef de projet</option>
<option value="3">Collaborateur </option>
</select>

<br/>
<label>Telephone</label><input type="text" id="telephone" name="telephone"/><br/>
<label>Fax</label><input type="text" id="fax" name="fax"/><br/>

<br/>
<div id="buttons">
<input type="reset" value="Annuler" id="Annuler" name="Annuler" />
<input type="button" value="Modifier" id="valider" name="valider" /><br/>
</div>
</form></p>
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
