<?php
// Connexion à la base de données
try
{
	
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO CHAT (NOME, MSG) VALUES(?, ?)');
$req->execute(array($_POST['NOME'], $_POST['MSG']));

// Redirection du visiteur vers la page du minichat
header('Location: CHAT.php');
?>