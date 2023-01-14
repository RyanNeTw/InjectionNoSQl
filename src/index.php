<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
  <label for="username">Nom d'utilisateur :</label>
  <input type="text" id="username" name="username">
  <br>
  <label for="password">Mot de passe :</label>
  <input type="password" id="password" name="password">
  <br>
  <input type="submit" value="Se connecter">
</form>
</body>
</html>

<?php

    require('../vendor/autoload.php');
    $connection = new MongoDB\Driver\Manager("mongodb+srv://ryan:ryan@cluster0.ihrbtxb.mongodb.net/test");
    if(!isset($_POST["password"]['$ne'])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $query = new MongoDB\Driver\Query([
            "username" => $username,
            "password" => ['$ne' => $password]
        ]);
        $res = $connection->executeQuery("users.users", $query)->toArray();
    }
    if($res){
        echo "Connexion réussi";
    }else{
        echo "Echec de connexion";
    }
?>






