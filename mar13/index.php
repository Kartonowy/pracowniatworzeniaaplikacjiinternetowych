<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odżywianie zwierząt</title>
    <link rel="stylesheet" href="styl4.css">
    <?php $db = new mysqli("127.0.0.1", "root", "", "baza") ?>
</head>
<body>
    <header>
        <h2>DRAPIEŻNIKI I INNE</h2>    
    </header>
    <div>
        <form action="">
            <h3>Wybierz styl życia</h3>
            <select name="rodzaj" id="">
                <option value="1">Drapieżniki</option>
                <option value="2">Roślinożercy</option>
                <option value="3">Wszystkożerne</option>
                <option value="4">Padlinożercy</option>
            </select>
            <input type="submit" value="Pokaż">
        </form>
        <div class="left">
            <h3>Lista zwierząt</h3> 
            <ul>
                <?php
                    $result = $db->query("select gatunek, rodzaj from zwierzeta join odzywianie on zwierzeta.Odzywianie_id = odzywianie.id");
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>{$row["gatunek"]} -> {$row["rodzaj"]}</li>";
                    }
                ?>
            </ul>
        </div>
        <div class="middle">
            <?php 
                if (isset($_GET["rodzaj"])) {
                    $rodzaj = $_GET["rodzaj"];
                    echo "<h3>" . match ($rodzaj) {
                        "1" => "Drapieżniki",
                        "2" => "Roślinożercy",
                        "3" => "Wszystkożerne",
                        "4" => "Padlinożercy",
                        default => "Nieznany rodzaj"
                    } . "</h3>";
                    $result = $db->query("select zwierzeta.id, gatunek, wystepowanie from zwierzeta join odzywianie on zwierzeta.Odzywianie_id = odzywianie.id where odzywianie.id = '$rodzaj'");
                    echo "<ul>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>{$row["id"]}.{$row["gatunek"]}, {$row["wystepowanie"]}</li>";
                    }
                    echo "</ul>";
                }
            ?>
        </div>
        <div class="right">
            <img src="drapieznik.jpg" alt="Wilki">
        </div>
    </div>
    <footer>
        <a href="pl.wikipedia.org">Poczytaj o zwierzętach na Wikipedii</a>
        <p>Stronę wykonał: 0123456789</p>
    </footer>
    <?php $db->close() ?>
</body>
</html>
