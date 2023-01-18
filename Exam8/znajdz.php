<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwiaty</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Moje kwiaty</h1>
    </header>
    <section id="lewy">
        <h3>Kwiaty dla Ciebie!</h3>
        <a href="https:///www.swiatkwiatow.pl/">Rozpoznaj kwiaty</a>
        <br/>
        <a href="znajdz.php">Znajdź kwiaciarnię</a>
        <br/>
        <img src="gozdzik.jpg" alt="Goździk"/>
    </section>
    <section id="prawy">
        <img src="gerbera.jpg" alt="Gerbera"/>
        <img src="gozdzik.jpg" alt="Goździk"/>
        <img src="roza.jpg" alt="Róża"/>
        <p>Podaj miejscowość, w której poszukujesz kwiaciarni</p>
        <form method="POST" actio="znajdz.php">
            <input type="text" name="miejsce"/>
            <input type="submit" value="SPRAWDŹ"/>
        </form>
        <?php
            if(isset($_POST['miejsce']))
            {
                $conn = mysqli_connect('localhost', 'root', '', 'kwiaciarnia');

                $miejsce = $_POST['miejsce'];

                $result = $conn->query(
                    "SELECT k.nazwa, k.ulica
                    FROM kwiaciarnie k
                    WHERE k.miasto = '$miejsce';");

                while($row = $result->fetch_row()){
                    $nazwa = $row[0];
                    $ulica = $row[1];

                    echo "$nazwa, $ulica";
                }

            $conn->close();
            }
        ?>
    </section>
    <footer>
        <h3>Stronę opracował: 00000000000</h3>
    </footer>
</body>
</html>