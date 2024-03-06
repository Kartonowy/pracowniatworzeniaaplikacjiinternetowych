<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
</head>
<body>
   <form method="post" action="">
        <label>
            <input type="text" name="nip">
        </label>
        <input type="submit">
   </form>

<?php
    if(isset($_POST['nip'])){
        $nip = $_POST['nip'];
        $nip = preg_replace('/\D/','',$nip);
        if(preg_match('/^\d{11,11}$/',$nip)){
            echo "<br><p style='color: green'>NIP: $nip</p>";
        }else{
            echo "<br><p style='color: red'>Podano złą ilość cyfr numeru NIP</p>";
        }
    }
?>

</body>
</html>

<!--
    Pobierz od użytkownika NIP poprzez input t text 
    użyj funkcji preg_replace() preg_match()
    









-->
