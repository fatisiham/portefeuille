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
input[type=text],input[type=password]
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
$("#user").change(
function()
{
	if( $("#user").val() == 'Vide' )
		$("#out").html("<p>Choix invalide</p>");
	else
	{
		$.post("includes/interaction.php",{"todo":"RechercheRole","user":$("#user").val()},
		function(data)
		{
			$("#out").html(data);
		}
		);
	}
});
</script>
<form>
<label>Nom utilisateur</label><select id="user">
<option value="Vide">Veuillez selectionner un utilisateur</option>
<?php
require_once("cnx.php");
$requete = $cnx->query("SELECT code_intervenant ID,login,CONCAT(nom,' ',prenom) AS user FROM intervenant");
while($data = $requete->fetch() )
echo '<option value='.$data["ID"].'>'.$data["login"].' : '.$data["user"].'</option>';
?>
</select>
</form><br/>
<div id="out">
</div>