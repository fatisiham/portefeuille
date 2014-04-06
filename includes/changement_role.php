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
input[type=text]
{
	display:block;
	margin:0px;
	width:200px;
}
input[type=button]
{
	margin-left:auto;
	margin-right:auto;
	width:100px;
	display:block;
	margin-top:25px;
}
#out
{
	width:600px;
	margin-top:25px;
	margin-left:auto;
	margin-right:auto;
}
#out p
{
	text-align:center;
}
</style>
<script type="text/javascript">
var profil = document.getElementById("profil");
profil.disabled = true;
$("#valider").click(
function()
{
	var ancien_profil;
	switch($("#profil").val())
	{
		case "Administrateur":
			ancien_profil = 1;
			break;
		case "chef projet":
			ancien_profil = 2;
			break;
		case "collaborateur":
			ancien_profil = 3;
			break;
	}
	if( ancien_profil == $("#new").val() )
		alert("Pas de nouveau profil affecté !");
	else if(ancien_profil != $("#new").val() && $("#new").val() != "Vide" )
	{
		$.post("includes/interaction.php",
				{"todo":"ChangeRole",
				"User":$("#user").val(),
				"NouveauRole":$("#new").val()},
				function(data)
				{
					alert(data);
					$("#form_role").each(function() {
                        this.reset();
                    });
				});
	}
});
$("#user").change(
function()
{
	if( $("#user").val() == 'Vide' )
		$("#out").html("<p>Choix invalide</p>");
	else
	{
		$.post("includes/interaction.php",{"todo":"RechercheRolePourInput","user":$("#user").val()},
		function(data)
		{
			$("#profil").val(data);
		}
		);
	}
});
</script>
<form id="form_role">
<label>Nom utilisateur</label><select id="user">
<option value="Vide">Veuillez selectionner un utilisateur</option>
<?php
require_once("cnx.php");
$requete = $cnx->query("SELECT code_intervenant ID,login,CONCAT(nom,' ',prenom) AS user FROM intervenant");
while($data = $requete->fetch() )
	echo '<option value='.$data["ID"].'>'.$data["login"].' : '.$data["user"].'</option>';
?>
</select><br/><br/>
<label>Profil</label><input type="text" id="profil"/><br/>
<label>Nouveau profil</label><select id="new">
<option value="Vide">Nouveau profil</option>
<option value="1">Administrateur</option>
<option value="2">Chef de projet</option>
<option value="3">collaborateur</option>
</select>
<br/>
<input type="button" id="valider" value="Changer"/>
</form><br/><br/>
<div id="out">
</div>