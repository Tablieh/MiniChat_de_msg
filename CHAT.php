<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>my-chat</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
    
        <form action="minichat_post.php" method="post">
        <p>
            <label for="NOME">NOME</label> : <input type="text" name="NOME" id="NOME" /><br />
            <label for="MSG">MSG</label> :  <input type="text" name="MSG" id="MSG" /><br />

            <input type="submit" value="Envoyer" />
        </p>
        </form>

         <?php
            // Connexion à la base de données
            try
            {
             $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
            }
            catch(Exception $e)
            {
             die('Erreur : '. $e->getMessage());
            }

            // Récupération des 10 derniers messages
            $reponse = $bdd->query('SELECT NOME, MSG FROM CHAT ORDER BY ID DESC LIMIT 0, 12');

            // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
            while ($donnees = $reponse->fetch())
            {
                echo '<p><strong>' . htmlspecialchars($donnees['NOME']) . '</strong> : ' . htmlspecialchars($donnees['MSG']) . '</p>';
            }

            $reponse->closeCursor();

            ?>
    </body>
</html>