<?php
session_start(); 
if( isset($_POST["se_connecter"]) )
{
	$erreur = false;
	$StringErreur = "";
	//LOGIN
	if( $_POST["ss_famille"] == 0)
	{
		$erreur = true;
		$StringErreur = "Le nom de sous famille est invalide /n!";
	}
	//NOM
	if( $_POST["nom"] == "" )
	{
		$erreur = true;
		$StringErreur .= "Le nom de projet est invalide !<br/>";
	}
	
		if( $_POST["ref"] == ""  )
	{
		$erreur = true;
		$StringErreur .= "Le reference march\351 est invalide !<br/>";
	}
	

	$f=$_POST["nom"];
	
	
	//DANS LE CAS OU TOUS LES CHAMPS SONT BIEN REMPLIS
	if( $erreur == false )
	{
		require_once("includes/cnx.php");
	 	$insertion = $cnx->prepare("INSERT INTO projet(`code_cp`, `code_famille`, `code_ss_famille`, `nom_p`, `maitre_d'oeuvre`, `maitre_d'ouvrage`, `statut`, `date debut p`, `date fin p`, `ref_marche`, `date_creation`) VALUES(?,?,?,?,?,?,?,?,?,?,NOW())");
		$insertion->execute(array($_POST["cp"],$_SESSION["a"],$_POST["ss_famille"],$_POST["nom"],$_POST["moe"],$_POST["mo"],'1',$_POST["date"],$_POST["date2"],$_POST["ref"]));
		if( $insertion->rowCount() > 0 )
		{    if( isset($_POST["col"]) )
		{$val=$_POST["col"];
		foreach ($val as $a)
		 {require_once("includes/cnx.php");
        $insertion = $cnx->prepare("INSERT INTO collaborateur(`code_col`, `nom_proj`) VALUES(?,?)");
		$insertion->execute(array($a,$f));}}

			$erreur = true;
			$StringErreur = 'Projet ajout\351 avec succ\351s !'; 
			
		}
	 }
		

 }
SortieSi:
?>



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
			<a href="./new-page-2.html"><span class="l"></span><span class="r"></span><span class="t">Accueil</span></a>
		</li>
		
				<li>
			<a href="ajout uti.php"><span class="l"></span><span class="r"></span><span class="t">gestion des utilisateurs</span></a>
		</li>


		
					<li>
			<a href="./gp.php"><span class="l"></span><span class="r"></span><span class="t">Gestion de profil</span></a>
		</li>


					<li>
			<a href="ajout proj1.php" class="active"><span class="l"></span><span class="r"></span><span class="t">Gestion de projets</span></a>
		</li>	

        <li>
			<a href="index.php"><span class="l"></span><span class="r"></span><span class="t">D&eacute;connexion</span></a>
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
						<li><a href="ajout famille.php">Gestion de familles</a></li>


			 
			<li><a href="ajout ss famille.php">Gestion de ss familles</a></li>


			 
						<li><a href="ajout proj1.php">Gestion de projets</a></li>
			<li><a href="ajout proj1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ajouter projet</a></li>
             <li><a href="consulter projet.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Consulter projet</a></li>
			<li><a href="supprimer proj.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Supprimer projet</a></li>
             <li><a href="modifier projet.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Modifier projet</a></li>

	 
			<li><a href="ajout phase.php">Gestion de phases</a></li>
			
			
            <li><a href="ajout livrable.php">Gestion de livrables</a></li>
			
             <li><a href="ajout risque.php">Gestion de risques</a></li>








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
                    Ajout de projets : 
                                        </h2>
                    <div class="cleared"></div>
                                    </div>
                                <div class="art-postcontent">
<p>
</p>
<?php 
if( isset($erreur) &&  $erreur == true){?>
<script language="javascript">
alert("<?php echo $StringErreur;?>");
</script>
<?php } ?>

<form action="" method="post">
<label>Sous famille</label><select id="user" name="ss_famille">
<option value="Vide">Veuillez selectionner une famille</option>
<?php
require_once("includes/cnx.php");
$requete = $cnx->query("SELECT code_ss_famille , nom_ss_famille FROM ss_famille where code_famille=".$_SESSION["a"]);
while($data = $requete->fetch() )
	echo '<option value='.$data["code_ss_famille"].'>'.$data["nom_ss_famille"].'</option>';
?>
</select><br/>
<label>Nom chef de projet</label><select id="user" name="cp">
<option value="Vide">Veuillez selectionner un Chef de projet</option>
<?php
require_once("includes/cnx.php");
$requete = $cnx->query("SELECT code_intervenant ID,login,CONCAT(nom,' ',prenom) AS user FROM intervenant  where profil=2");
while($data = $requete->fetch() )
	echo '<option value='.$data["ID"].'>'.$data["login"].' : '.$data["user"].'</option>';
?>
</select><br/>


<label>Nom projet</label><input type="text" id="nom" name="nom"/><br>
<label>Maitre d'oeuvre</label><input type="text" id="moe" name="moe"/><br/>
<label>Maitre d'ouvrage</label><input type="text" id="mo" name="mo"/><br/>
<label>date de debut planifi&eacute;</label><input  name="date"  value="00-00-0000" /><br /><br>
<label>date de fin planifi&eacute;</label><input  name="date2"  value="00-00-0000" /><br />
<br/>
<label>ref&eacute;rence march&eacute;</label><input type="text" id="ref" name="ref"/><br/>
<label>Collaborateurs</label>
<select id="user" name="col[]" multiple='multiple'>
<option value="Vide">Veuillez selectionner les collaborateurs de ce projet :</option>
<?php
require_once("includes/cnx.php");
$requete = $cnx->query("SELECT code_intervenant ID,login,CONCAT(nom,' ',prenom) AS user FROM intervenant  where profil=3");
while($data = $requete->fetch() )
	echo '<option value='.$data["ID"].'>'.$data["login"].' : '.$data["user"].'</option>';
?>
</select><br/>



&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Annuler" id="Annuler" name="Annuler" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Cr&eacute;er projet" id="se_connecter" name="se_connecter" /><br/>
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
                                

<p>Copyright &copy; 2012. Fatima MARZOUKI.Ecole Sup&eacute;rieure De Technologie</p>


                                                            </div>
                    <div class="cleared"></div>
                </div>
            </div>
    		<div class="cleared"></div>
        </div>
    </div>

</body>
</html>
