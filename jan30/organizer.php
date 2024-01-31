<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sierpniowy kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
    <section class="first">
        <h1>Organizer: SIERPIEŃ</h1>
    </section>
    <section class="second">
        <form action="./organizer.php" method="post">
            <label>Zapisz wydarzenie</label>
            <input type="text" name="save_event" id="">
            <input type="hidden" name="date" value="2020-08-09">
            <input type="submit" value="OK">
        </form>
    </section>
    <section class="third">
        <img src="zad5/logo2.png" alt="sierpień">
    </section>
    </header> 
    <main>
        <?php 
            $conn = mysqli_connect("127.0.0.1", "root", "", "kalendarz");
            function update_sql($input, $date) { return "UPDATE zadania set wpis = '$input' where dataZadania LIKE '$date'"; }
            $select_sql = "SELECT dataZadania, wpis from zadania where miesiac = 'sierpien'";
            
            if (isset($_POST['save_event'])) {
                mysqli_query($conn, update_sql($_POST['save_event'], $_POST['date']));
            }
            
            $result = mysqli_query($conn, $select_sql);
            foreach ($result as $row) {
                echo "<div> <h5>" . $row['dataZadania'] . "</h5> <p>" . $row['wpis'] . "</p> </div>";
            }
        ?>
    </main>
    <footer>Stronę wykonał: 69213742069</footer>
    <script src="main.js?v=<?php echo time() ?>"></script>
</body>
</html>
<?php mysqli_close($conn);
