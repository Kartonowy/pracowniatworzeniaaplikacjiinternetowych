<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <?php $db = new mysqli("127.0.0.1", "root", "", "jan17"); 
        session_start();
        if ($_SESSION["login"] != "correct") {
            header("Location: http://localhost:8000/login.php");
        }
?>
</head>
<body>
    <section class="cv">
        <h2>Moje CV</h2>
        <p>Imie ucznia - znam jezyki programowania ..., umiem ....,
        znam jezyk angielski na poziomie ...., inny język,
        Jestem odpowiedzialny, punktualny...
        Moi zainteresowania (hobby): sport,....</p>
    </section>
    <aside>
        <p>Dzisiaj jest <span class="date">21 lutego 2022</span></p>
        <table>
            <td class="h"></td>
            <td class="min"></td>
            <td class="s"></td>
        </table>
    </aside>
    <main>
        <h2>Tutaj zobaczysz moje projekty</h2> 
        <div class="cardwrapper">
            <a href="https://github.com/Kartonowy/init.lua"><img src="init.png" alt="init"></a>
            <a href="https://github.com/Kartonowy/todo-app"><img src="todo.png" alt="todo"></a>
            <a href="https://github.com/Kartonowy/arduinoLEDController"><img src="arduino.png" alt="arduino"></a>
            <a href="https://github.com/Kartonowy/iconfig"><img src="iconfig.png" alt="iconfig"></a>
            <a href="https://github.com/Kartonowy/BookNook"><img src="booknook.png" alt="booknook"></a>
            <a href="https://github.com/Kartonowy/Pandemonica"><img src="pandemonica.png" alt="pandemonica"></a>
            </div>
    </main>
    <div class="bottom">
        <p>Oceń mój projekt <input type="number" name="rating" id="ratinginput" min="1" max="6"></p>

        <p>Otrzymałem ocenę: <span class="rating">1</span>!!</p>
    </div>
    <script src="onsite.js"></script>
</body>
</html>
<?php 

