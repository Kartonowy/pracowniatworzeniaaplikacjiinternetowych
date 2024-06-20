<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>kolorki</title>
        <link rel="stylesheet" href="style.css">
<?php $db = new mysqli("127.0.0.1", "root", "", "kolorki"); 
    $en_regex = "/^[a-zA-Z]+/";
    $pl_regex = "/^[a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ-]+/";
    $fr_regex = "/^[a-zA-ZàâäæèéêëîïôœùûüÿçÀÂÄÈÉÊËÎÏÔŒÙÛÜŸÇ-]+/";
?>
    </head>
    <body>
        <header>
            <h1>Colories</h1>
            <div class="beauty-line">
        </header>
        <aside>
            <h2>Color selection</h2>
            <p>Write the name of the color down below,  <br>
                Select a language and voilà.</p>
            <form action="" method="post">
                <input type="text" name="colname" id="">
                <select name="lang" id="">
                    <option value="polish">pl</option>
                    <option value="english">en</option>
                    <option value="french">fr</option>
                </select>
                <input type="submit" value="Submit">
            </form>
        </aside>
        <aside>
<?php 
    if (isset($_POST['lang']) && isset($_POST['colname'])) {

    $query = "SELECT polish, english, french, hex from colories where " . $_POST['lang'] . " = '" . $_POST['colname'] . "'";
    $result = $db->query($query)->fetch_assoc();
    if ($result == null) {
        echo "<div class='wrapper'> 
        <form method='post' class='newly'>
<label>Color was not found, but you can add it!</label>
    <input type='text' name='polish' id='' placeholder='polish'>
    <input type='text' name='english' id='' placeholder='english'>
    <input type='text' name='french' id='' placeholder='french'>
    <input type='text' name='hex' id='' placeholder='hex code'>
                <input type='submit' value='Submit'>
</form> </div>";
} else {
echo "
<div class='wrapper'>
            <h1> -- Color -- </h1>
            <div class='lang'>
                <h2>Polish</h2>
                <h3>" . $result['polish']."</h3>
            </div>
            <div class='lang'>
                <h2>English</h2>
                <h3>". $result['english'] ."</h3>
            </div>
            <div class='lang'>
                <h2>French</h2>
                <h3>" . $result['french'] ."</h3>
            </div>

</div>";
    echo sprintf("<script>
        document.querySelector(':root').style.setProperty('--main-color', '%s')
        document.querySelector(':root').style.setProperty('--main-bg', '%s')

</script>", $result['hex'], $result['hex'] . "44");
}
}
    if (isset($_POST['polish']) && preg_match($pl_regex, $_POST['polish']) && isset($_POST['english']) && preg_match($en_regex, $_POST['english']) && isset($_POST['french']) && preg_match($fr_regex, $_POST['french']) &&isset($_POST['hex'])) {
    $query = sprintf("INSERT INTO colories (polish, english, french, hex) 
    VALUES ('%s', '%s', '%s', '%s')", $_POST['polish'], $_POST['english'], $_POST['french'], $_POST['hex']);
    $result = $db->query($query);
    if ($result) {
    echo "<h1>Color added!</h1>";
    echo sprintf("<script>document.documentElement.style.setProperty('--main-color', '%s')</script>", $result['hex']);
} else {
    echo "<h1>There was a problem adding the color.</h1>";
}
}
?>
        </aside>
<footer>
<div class="beauty-line"></div>
</footer>
    </body>
</html>
<?php 
