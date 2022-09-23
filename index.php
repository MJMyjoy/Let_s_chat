<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
 form 
 { text-align:center;}
 </style> 
<title>Mini chat!</title>
</head>
<body>
    <h1>
    Let's chat!
    </h1>
    <form action="mini_post.php" method="POST">
    <label for="prenom">Pseudo: </label>
    <input id="prenom" name="pseudo" type="text" /><br />
    <label for="message">Message: </label>
    <input id="message" name="message" type="text" /><br />
    <input type="submit" value="Envoyer" />
    </form>

    <br>
    <a href="index.php">Rafraichir</a>
    <br>

    <?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); }
    catch (Exception $e) { 
        die('Erreur : ' . $e->getMessage()); }
        $reponse = $db->query('SELECT Pseudo, Messages, DATE_FORMAT(dates, \'%d/%m/%Y %Hh%imin%ss\') AS mydate FROM mini_chat ORDER BY ID DESC LIMIT 0,10 '); 
        while ($donnees = $reponse->fetch())
{echo '<p><em>' . $donnees['mydate'] . '</em> :<strong>'. htmlspecialchars($donnees['Pseudo']). ': </strong>' . htmlspecialchars($donnees['Messages']) . '</p>'; }
$reponse->closeCursor(); ?>
        
</body>
</html> 