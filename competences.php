<!DOCTYPE html>
<html>
<head>
	<title>Embauchez-Moi!</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="stylecomp.css">
</head>
<body>

<?php
try
{
    $bdd = new PDO('mysql: host=localhost;dbname=embauchez-moi;charset=utf8' , 'root' ,'chuck');
}
catch (Exception $e)
{
        die('Erreur:' .$e->getMessage());
}

if (!empty($_POST['nom']) && !empty($_POST['niveau'])){

$stmt = $bdd->prepare('INSERT INTO COMPETENCES(nom,niveau, description)
        VALUES (:nom, :niveau, :description)');

    $stmt->execute (array('nom'=>$_POST['nom'], 'niveau'=>$_POST['niveau'] , 'description'=> $_POST['description']));

    echo "votre compétence à bien été enregistrée.";


  }  
 else
 {

     //echo "le nom et/ou le niveau ne sont pas remplis.";
 ?>


<form action="competences.php" method="post">
	<fieldset>
		<h1>Ajouter une compétence:</h1>
		<label>Nom: </label>
		<input type="text" name="nom">
<?php
if(isset($_POST['nom']) && empty($_POST['nom'])){
	echo "<span class=\"erreur\">Le champs nom n'est pas rempli.</span>";
}
?>
		<br>
		<br>
		<label>Niveau:</label>

       <div class="rating"><!--
   --><a onclick ="getElementById('niveau').value=5;" href="#1" title="Donner 5 étoiles">☆</a><!--
   --><a onclick ="getElementById('niveau').value=4;" href="#2" title="Donner 4 étoiles">☆</a><!--
   --><a onclick ="getElementById('niveau').value=3;" href="#3" title="Donner 3 étoiles">☆</a><!--
   --><a onclick ="getElementById('niveau').value=2;" href="#4" title="Donner 2 étoiles">☆</a><!--
   --><a onclick ="getElementById('niveau').value=1;" href="#5" title="Donner 1 étoile">☆</a>
</div>
<?php
if(isset($_POST['niveau']) && empty($_POST['niveau'])){
	echo "<span class=\"erreur\">le champs niveau n'est pas rempli.</span>";
}
?>

 <input id="niveau" type="hidden" name="niveau">
        <br>
        <br>
        <br>
        <br>
		<label>Description:<br>(facultatif)</label>
		<br>
		​<textarea id="txtArea" name="description" rows="10" cols="70"></textarea>
		<br>
		<br>
		<button>Annuler</button>
		<input type="submit" name="valider" value="Valider">
	</fieldset>
</form>
<?php
}
?>
</body>
</html>