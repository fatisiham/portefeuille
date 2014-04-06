<?php
session_start();
$erreur = false;
$StringErreur = "";
if(isset($_POST["se_connecter"]))
{
	if( $_POST["login"] == "" || !preg_match("#^([a-z]|[0-9])*$#i",$_POST["login"]) )
	{
		$erreur = true;
		$StringErreur = "Le login est invalide !<br/>";
	}
	
	if( $_POST["password"] == "" || !preg_match("#^([a-z]|[0-9]|.)*$#i",$_POST["password"]) )
	{
		$erreur = true;
		$StringErreur .= "Le mot de passe est invalide !<br/>";
	}
	if($erreur == false)
	{
		require_once("includes/cnx.php");
		$requete_verification = $cnx->prepare("SELECT password,profil,statut FROM intervenant WHERE login LIKE ?");
		$requete_verification->execute(array($_POST["login"]));
		$infos = $requete_verification->fetch();
		if($requete_verification->rowCount() == 0 )
		{
			$erreur = true;
			$StringErreur = "Login introuvable !";
		}
		else
		{
			if($infos["password"] == $_POST["password"])
			{
				if($infos["statut"] == 2)
				{
					$erreur = true;
					$StringErreur = "Votre compte est d\351sactive !";
				}
				else if($infos["statut"] == 1)
				{
					$_SESSION["user"] = $_POST["login"];
					$_SESSION["profil"] = $infos["profil"];
					if ($_SESSION["profil"]==1)
					header("location:aj uti.php");
					else if ($_SESSION["profil"]==2)
					header("location:cp.php");
					else if ($_SESSION["profil"]==3)
					header("location:aj uti.php");
				}
			
			}
			else if($_POST["password"] != $infos["password"])
			{
				$erreur = true;
				$StringErreur = "Mot de passe invalide !";
			}
		}
	}
	
}
?>
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
			<a href="#"><span class="l"></span><span class="r"></span><span class="t">Accueil</span></a>
		</li>
        <li>
			<a href="#"><span class="l"></span><span class="r"></span><span class="t">Gestion des  utilisateurs</span></a>
		</li>	

				<li>
			<a href="#"><span class="l"></span><span class="r"></span><span class="t">gestion de profils</span></a>
		</li>


		<li>
			<a href="#"><span class="l"></span><span class="r"></span><span class="t">gestion de projets</span></a>
		</li>
					<li>
			<a href="#" class="active"><span class="l"></span><span class="r"></span><span class="t">Connexion</span></a>
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
            <li><a href="accueil.php">Accueil</a></li>
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
                    Gestion des intervenants : 
                                        </h2>
                    <div class="cleared"></div>
                                    </div>
                                <div class="art-postcontent">

<p>
<img src="images/preview.jpg" alt="an image" style="float:left;" /> 

<center>
<?php 
if( isset($erreur) &&  $erreur == true){?>
<script language="javascript">
alert("<?php echo $StringErreur;?>");
</script>
<?php } ?>


<h1><font color="grey"><em>&nbsp; Veuillez-vous </em></font></h1>
<center><h1><font color="grey"><em>&nbsp; &nbsp; &nbsp;identifier !</em></font></h1></center>

<img src="users.jpg" widht="200" alt="" />
<form action="index.php" method="post">
<table BGCOLOR="gray" border="0">
<center>
<tr>
<td><span class="plop"><font face="comic sans ms"><b>Login</b></font><font color="red"> * </font></span></td>
<td><input type="text" id="login" name="login"/></td></tr>
<tr>
<td><span class="plop"><font face="comic sans ms"><b>Votre mot de passe:</b></font><font color="red"> * </font></span></td>
<td><input type="password" id="password" name="password"/></td></tr>
<tr><td colspan="2" align="center">
</center><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="se_connecter" value="login"/>


</td>
</tr>
</table>
</form> 
  </center>

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
    <div class="cleared"></div>
    <p class="art-page-footer"><a href="http://www.2createawebsite.com/artisteer">Website Template</a> created with <a href="http://www.2createawebsite.com/artisteer">Artisteer</a>.</p>
    <div class="cleared"></div>
</div>
</div>

</body>
</html>
