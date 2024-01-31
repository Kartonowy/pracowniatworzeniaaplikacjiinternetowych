<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Zaloguj się
   <form action="" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="Log in">
    </form> 
    lub Zarejestruj się
   <form action="" method="post">
        <input type="text" name="regusername" placeholder="username">
        <input type="password" name="regpassword" placeholder="password">
        <input type="password" name="rpassword" placeholder="repeat password">
        <input type="submit" value="Register">
    </form> 
</body>
</html>

<?php
$db = new mysqli("127.0.0.1", "root", "", "jan17");
session_start();
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $login_query = "SELECT username, password FROM users WHERE username = '$username'";
    $result = $db->query($login_query)->fetch_row();
    echo sha1($password) . " " . $result["password"];
    if ($result == null) {
        echo "User doesnt exist";
        foreach( $result as $row ) {
echo $row;
};
} else if ($result["password"] == sha1($password)) {
       $_SESSION["login"] = "correct";
        echo "w";
        header("Location: http://localhost:8000");
    } else {
        echo "Password invalid";
    }
}

if (isset($_POST["regusername"]) && isset($_POST["regpassword"]) && isset($_POST["rpassword"])) {
    $username = $_POST["regusername"];
    echo $username;
    $password = $_POST["regpassword"];
    $repeated_password = $_POST["rpassword"];
    if ($password != $password)  {
        echo "Passwords doesnt match";
} else {
    $create_query = "INSERT INTO users(username, password) VALUES ('$username','" .  sha1($password) . "');";
    printf($create_query);
    $db->query($create_query);
    echo "Added to the db! Now you can log in";
}
}
