<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="./styl4.css">
<?php 
    $db = new mysqli("localhost", "root", "", "dane_wm");
?>
    </head>
    <body> 
    <header class="baner">
    <h3>Portal Społczenościowy - panel administratora</h3>
    </header> 
    <aside><h4>Użytkownicy</h4>
    <!-- Użytkownicy -->
<?php 
$sql = "SELECT id, imie, nazwisko, rok_urodzenia, zdjecie from osoby LIMIT 30";
$result = $db->query($sql);
foreach ($result as $row) {
    $age = date("Y")- $row['rok_urodzenia']; 
    echo $row['id'] . ". " . $row['imie'] . " " . $row['nazwisko'] . " " . $age . " lat <br>";
}

?>
<a href="./settings.html">Inne ustawienia</a>
</aside>
<article>
<h4>Podaj id użytkownika</h4>
<form action="" method="post">
<input type="number" name="id">
<input type="submit" value="ZOBACZ">
</form>
<hr>
<!-- -->
</article>
<footer>
Stronę wykonał: 692137420

</footer>
</body>
</html>


<?php









    $db->close();
