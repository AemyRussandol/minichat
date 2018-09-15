<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Minichat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script src="main.js"></script>
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body>

    <form action="minichat_post.php" method="post">
        <div class="form-group">
            <label for="user">Pseudo</label>
            <input type="text" class="form-control" id="user" name="pseudo" aria-describedby="emailHelp" placeholder="Entrez votre pseudo">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <input type="text" class="form-control" id="message" name="message" placeholder="Message">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    <?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=mysql;dbname=minichat;charset=utf8', 'root', 'mysecretpassword');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table message
$reponse = $bdd->query('SELECT * FROM message ORDER BY ID DESC LIMIT 0, 10');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <p>
        <?php echo $donnees['pseudo']; ?> :
        <?php echo $donnees['message']; ?>
    </p>
    <?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
</body>

</html>