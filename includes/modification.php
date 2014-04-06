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
<form id="form_modif">
<label>Liste utilisateurs</label><select id="list_users">
<option value="Vide">Veuillez choisir un utilisateur</option>
<?php
require_once("cnx.php");
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
</form>