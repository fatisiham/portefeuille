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
<script type="text/javascript">
$("#valider").click(
function()
{
	$.post("includes/interaction.php",{"todo":"Inscription","login":$("#login").val(),"password":$("#paswd").val(),"nom":$("#nom").val(),"prenom":$("#prenom").val(),"email":$("#email").val(),"cin":$("#cin").val(),"civilite":$("#civilite").val(),"profil":$("#profil").val(),"telephone":$("#telephone").val(),"fax":$("#fax").val(),"adresse":$("#adresse").val()},function(data){alert(data);});
}
);
</script>
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
<label>Civilité</label><select id="civilite" name="civilite">
<option value="0">Veuillez choisir une civilité</option>
<option value="1">Mademoiselle</option>
<option value="2">Madame</option>
<option value="3">Monsieur</option>
</select><br/>
<label>Adresse</label><input type="text" id="adresse" name="adresse"/><br/>
<input type="reset" value="Annuler" id="Annuler" name="Annuler" />
<input type="submit" value="Créer compte" id="se_connecter" name="se_connecter" /><br/>
</form>
</body>
</html>