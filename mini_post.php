<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Mini chat!</title>
</head>
<body> 
   <?php
    try {
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); }
    catch (Exception $e) { 
     die('Erreur : ' . $e->getMessage()); }

     if (isset($_POST['pseudo']) AND isset($_POST['message']) AND $_POST['pseudo']!=NULL AND $_POST['pseudo']!=NULL)
     {
    $req = $db->prepare('INSERT INTO mini_chat VALUES(\'\', NOW(), ?,?)');
    $req->execute(array($_POST['pseudo'], $_POST['message'])); }
    header('Location: index.php');  ?>
    </body>
    </head>