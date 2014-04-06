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
#out
{
	width:600px;
	margin-top:25px;
	margin-left:auto;
	margin-right:auto;
}
</style>
<script type="text/javascript">
$("#login").keyup(
function()
{
	if( $("#login").val() == '' )
		$("#out").html(" ");
	else
	{
		$.post("includes/interaction.php",{"todo":"RechercheUtilisateurParNom","login":$("#login").val()},
		function(data)
		{
		$("#out").html(data);
		}
		);
	}
});
</script>
<form>
<label>Nom utilisateur</label><input type="text" id="login" name="login"/>
</form><br/>
<div id="out">
</div>