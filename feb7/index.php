    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
// Przygotuj pole dyskusyjne. Uzytkownik po wybraniu 1 z 3 kategorii tematow moze zrobic posta
//ustal ze post pojawi sie na stronie i zostanie zapisany do bazy,
//jesli jego dlugosc bedzie min 35 znakow
//Na stronie glownej widzimy najnowsze wpisy 
//Po wybraaniu kategorii widzimy 5 postow z danej kategorii
    $db = new mysqli("127.0.0.1", "root", "", "forum");
?>
    <header>
    <form method="post">
        <textarea name="text" id="" cols="30" rows="10"></textarea>
        <select name="category" id="">
            <option value="martwe komórki">marte komórki</option>
            <option value="spadek tytanów 2">spadek tytanów 2</option>
            <option value="geozgadywacz">geozgadywacz</option>
        </select>
        <input type="submit" value="Post">
    </form>
    <?php 
        if (isset($_POST['category']) && isset($_POST['text'])) {
            $cat = $_POST['category'];
            $text = $_POST['text'];
            $sql = "INSERT INTO posts (category_id, text) VALUES ((SELECT category_id from categories WHERE category_name = '$cat'), '$text')";
            $result = $db->query($sql) or die("of cringe");
            echo "added";
}
    ?>
    </header>
    <?php 
       $uno_sql = "SELECT text from posts WHERE category_id = 1";
       $dos_sql = "SELECT text from posts WHERE category_id = 2";
       $tres_sql = "SELECT text from posts WHERE category_id = 3";

        $res = $db->query($uno_sql);
        foreach ($res as $row) {
            echo "Martwe komórki <br>" . $row['text'];
}
        $res = $db->query($dos_sql);
        foreach ($res as $row) {
            echo "spadek tytanów 2 <br>" . $row['text'];
}
        $res = $db->query($tres_sql);
        foreach ($res as $row) {
            echo "geozgadywacz <br>" . $row['text'];

}
    ?>
</body>
</html>
    
