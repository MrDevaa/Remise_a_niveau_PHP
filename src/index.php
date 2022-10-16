<?php

$username = filter_input(INPUT_POST, "blabla"); 
$mail = filter_input(INPUT_POST, "mail", FILTER_VALIDATE_EMAIL); 
$password = filter_input(INPUT_POST, "password");

if (!empty($username) && !empty($mail) && !empty($password)){
    
    $passwordhash = password_hash("$password", PASSWORD_DEFAULT);

    $pdo = new PDO("mysql:host=database:3306;dbname=php_db", "root", "password");
    $query = $pdo->prepare("INSERT into users (username, mail, password) VALUES('$username', '$mail', '$passwordhash')");
    $query->execute();
    header("location:form.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
    <div class = "container">
        <h1>Incrivez-vous</h1>
        <form method = "post">
            
            <div class ="username">
                 <label for="validationusername">Username</label>
                 <input type="text" name="blabla" placeholder="Entrez votre username" required>
            </div>
            <div class ="mail">
            <label for="validationmail">Mail</label>
                    <input type="email" placeholder="Entrez votre mail" name="mail" required>
            </div>
            <div class = "password">
            <label for="validationpassword"class="form-label">Password</label>
                <input type="password" name ="password" pattern="[A-Za-z0-9]+"  placeholder="********" required>
            </div>
            <button type ="submit"> Envoyer </button>
        </form>
    </div>


</body>
</html>