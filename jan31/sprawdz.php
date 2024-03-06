<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="sprawdz.php" method="post" >
        Imię: <input type="text" name="imie" /><br/>
        Telefon: <input type="text" name="telefon" /><br/>
        E-mail: <input type="text" name="email" /><br/>
        Treść wiadomości:<br/> 
        <textarea name="tresc">TUTAJ WPISZ TREŚĆ</textarea>      
        <input type="submit" value="OK" /><br/>   
    </form>
</body>
</html>

<?php 

if (isset($_POST['email']) && isset($_POST['telefon'])) {
   $email_pattern = "/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/";
   $phone_pattern = "/\d{9}/";

    if (preg_match($email_pattern, $_POST['email'])) {
    echo "email good";
} else {
    echo "email bad";
}

    if (preg_match($phone_pattern, $_POST['telefon'])) {
    echo "phone good";
} else {
    echo "phone bad";
}

}
