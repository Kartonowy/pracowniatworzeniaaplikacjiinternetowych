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
            <div id="beauty-line">
        </header>
        <aside>
            <h2>Color selection</h2>
            <form action="" method="post">
            <p>Write the name of the color down below,</p>
            <p>select a language and voilà</p>
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
        echo "<div class='wrapper'> Color was not found, but you can add it! <br>
        <form method='post'>
    <input type='text' name='polish' id=''>
    <input type='text' name='english' id=''>
    <input type='text' name='french' id=''>
    <input type='text' name='hex' id=''>
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
console.log('xd')
function hexToHSL(hex) {
  var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    r = parseInt(result[1], 16);
    g = parseInt(result[2], 16);
    b = parseInt(result[3], 16);
    r /= 255, g /= 255, b /= 255;
    var max = Math.max(r, g, b), min = Math.min(r, g, b);
    var h, s, l = (max + min) / 2;
    if(max == min){
      h = s = 0; // achromatic
    }else{
      var d = max - min;
      s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
      switch(max){
        case r: h = (g - b) / d + (g < b ? 6 : 0); break;
        case g: h = (b - r) / d + 2; break;
        case b: h = (r - g) / d + 4; break;
      }
      h /= 6;
    }
  var HSL = new Object();
  HSL['h']=h;
  HSL['s']=s;
  HSL['l']=l;
  return HSL;
}
        let output = hexToHSL(%s)
        console.log(output)
        document.documentElement.style.setProperty('--main-color', '%s')
        document.documentElement.style.setProperty('--bg-color', 'hsl(output['h'], output['s']\%, output['l']\%)')

</script>", $result['hex'], $result['hex']);
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
    </body>
</html>
<?php 
