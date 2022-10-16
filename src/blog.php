<?php
session_start();
$titlepost = filter_input(INPUT_POST, "titlepost"); 
$desc = filter_input(INPUT_POST, "post_txt"); 
$id = $_SESSION["id"];


//  var_dump(!empty($titlepost), $titlepost);
if (!empty($titlepost) && !empty($desc)){
    $pdo = new PDO("mysql:host=database:3306;dbname=php_db", "root", "password");
    $query = $pdo->prepare("INSERT into posts (title_post, post_txt, user_id) VALUES(:titlepost, :desc, :id)");
    $query->execute([
        ":titlepost" => $titlepost,
        ":desc" => $desc,
        ":id" => $id
        ]);
}

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <div class="content"> 
        <form method="post">
        <div class ="title_post">
                 <label for="validationtitlepost">Title</label>
                 <input type="text" name="titlepost" placeholder="Ecrivez quelque chose" required>
            </div>
            <div class ="post_txt">
                 <label for="validationposttxt">Description</label>
                 <input type="text" name="post_txt"  required>
            </div>
            <input type="submit" value="Submit">
                </form>
    </div>
    
</body>
</html>