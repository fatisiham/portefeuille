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
$(init);
function init()
{
	var statut = document.getElementById("statut").disabled = true;
	$("#list_users").change(
	function()
	{
		$.post("includes/interaction.php",{"todo":"RechercheUtilisateur","id":$("#list_users").val()},
		function(data)
		{
			var statut = document.getElementById("statut");
			var profil = document.getElementById("profil");
			var civilite = document.getElementById("civilite");
			var infos = data.split('|');
			$("#login").val(infos[1]);
			$("#paswd").val(infos[2]);
			$("#nom").val(infos[3]);
			$("#prenom").val(infos[4]);
			$("#email").val(infos[5]);
			$("#cin").val(infos[6]);
			$("#adresse").val(infos[8]);
			$("#telephone").val(infos[10]);
			$("#fax").val(infos[13]);
			
			for(var i=0;i<statut.length;i++)
			{
				if( statut.options[i].value == infos[0] )
						statut.options[i].selected = true;
				
		    }
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
	$("#valider").click(
	function()
	{
		var selected_user = "";
		var users = document.getElementById("list_users");
		for(var i=0;i<users.length;i++)
		{
			if( $("#list_users").val() == users.options[i].value ) 
				selected_user = users.options[i].text;
		}
		var reponse = confirm("Voulez-vous vraiment désactive ce compte ("+selected_user+") !");
		if( reponse )
		{
			$.post("includes/interaction.php",{"todo":"Desactivation","id":$("#list_users").val()},function(data){alert(data);});
			$("#content").load("includes/desactivation.php");
		}
	});
}
</script>
<form>
<label>Liste utilisateurs</label><select id="list_users">
<option value="Vide">Veuillez choisir un utilisateur</option>
<?php
require_once("cnx.php");
$requete = $cnx->query("SELECT code_intervenant ID,login FROM intervenant");
while( $data = $requete->fetch() )
	echo '<option value="'.$data["ID"].'">'.$data["login"].'</option>';
?>
</select><br/>
<label>Statut</label><select id="statut">
<option value="vide">Veuillez choisir un utilisateur</option>
<option value="1">Activé</option>
<option value="2">Désactivé</option>
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
<div id="buttons">
<input type="reset" value="Annuler" id="Annuler" name="Annuler" />
<input type="button" value="Désactiver" id="valider" name="valider" /><br/>
</div>
</form>