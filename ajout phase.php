<?php
session_start(); 
if( isset($_POST["se_connecter"]) )
{
	$erreur = false;
	$StringErreur = "";
	//LOGIN
	if( $_POST["proj"] == 0)
	{
		$erreur = true;
		$StringErreur = "Le nom de projet est invalide /n!";
	}
	//NOM
	if( $_POST["nom"] == "" )
	{
		$erreur = true;
		$StringErreur .= "Le nom de phase est invalide !<br/>";
	}
	
	
	
	//DANS LE CAS OU TOUS LES CHAMPS SONT BIEN REMPLIS
	if( $erreur == false )
	{
		require_once("includes/cnx.php");
	 	$insertion = $cnx->prepare("INSERT INTO phase(`code_projet`, `num_phase`,`nom_ph`,`date_debut_p`, `date_fin_p`, `date_creation`) VALUES(?,?,?,?,?,NOW())");
		$insertion->execute(array($_POST["proj"],$_POST["num"],$_POST["nom"],$_POST["date"],$_POST["date2"]));
		if( $insertion->rowCount() > 0 )
		{    
			$erreur = true;
			$StringErreur = 'Phase ajout\351 avec succ\351s !'; 
			
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
			<a href="accueil1.php"><span class="l"></span><span class="r"></span><span class="t">Accueil</span></a>
		</li>
		
				<li>
			<a href="ajout uti.php"><span class="l"></span><span class="r"></span><span class="t">gestion des utilisateurs</span></a>
		</li>


		
					<li>
			<a href="./gp.php"><span class="l"></span><span class="r"></span><span class="t">Gestion de profil</span></a>
		</li>


					<li>
			<a href="./ajout famille.php" class="active"><span class="l"></span><span class="r"></span><span class="t">Gestion de projets</span></a>
		</li>	

        <li>
			<a href="./index.php"><span class="l"></span><span class="r"></span><span class="t">D&eacute;connexion</span></a>
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

	 
			<li><a href="ajout phase.php">Gestion de phases</a></li>
						<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ajouter phase</a></li>
             <li><a href="consulter phase.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Consulter phase</a></li>
			<li><a href="supprimer phase.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Supprimer phase</a></li>
             <li><a href="modifier phase.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Modifier phase</a></li>

			
			
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
                    Ajout d'une phase : 
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
<label>Projet</label><select id="user" name="proj">
<option value="Vide">Veuillez selectionner un projet</option>
<?php
require_once("includes/cnx.php");
$requete = $cnx->query("SELECT code_projet ID,nom_p FROM projet");
while($data = $requete->fetch() )
	echo '<option value='.$data["ID"].'>'.$data["nom_p"].'</option>';
?>
</select><br/>

<label>Num phase</label><input type="text" id="num" name="num"/><br>

<label>Nom phase</label><input type="text" id="nom" name="nom"/><br>
<label>date de debut planifi&eacute;</label><input  name="date"  value="00-00-0000" /><br /><br>
<label>date de fin planifi&eacute;</label><input  name="date2"  value="00-00-0000" /><br />
<br/>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Annuler" id="Annuler" name="Annuler" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Cr&eacute;er phase" id="se_connecter" name="se_connecter" /><br/>
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
