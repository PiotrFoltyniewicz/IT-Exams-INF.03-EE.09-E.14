<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styl.css" rel="stylesheet"/>
    <title>Rozgrywki futbolowe</title>
</head>
<body>
    <header>
        <h2>Światowe rozgrywki piłkarskie</h2>
        <img src="obraz1.jpg" alt="boisko"/>
    </header>
    <section id="mecze">
        <!-- Skrypt 1 -->
        <?php 
            $conn = mysqli_connect("localhost", "root", "", "egzamin");
            $result = mysqli_query($conn, "SELECT r.zespol1 AS 'Zespół 1', r.zespol2 AS 'Zespół 2', r.wynik AS 'Wynik', r.data_rozgrywki AS 'Data rozgrywki'
            FROM rozgrywka r
            WHERE r.zespol1 = 'EVG'");
            while($row = mysqli_fetch_assoc($result)){
                $z1 = $row['Zespół 1'];
                $z2 = $row['Zespół 2'];
                $wynik = $row['Wynik'];
                $data = $row['Data rozgrywki'];
                echo "<section class=\"mecz\">";
                echo "<h3>$z1 - $z2</h3>";
                echo "<h4>$wynik</h4>";
                echo "<p>w dniu: $data</p></section>";
            }
            mysqli_close($conn);
        ?>
    </section>
    <section id="glowny">
        <h2>Reprezentacja Polski</h2>
    </section>
    <section id="info">
        <section id="lewy">
            <p>Podaj pozycję zawodników (1-bramkarza, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
            <form name="formularz" action="futbol.php" method="POST">
                <input type="number" name="num"/>
                <input type="submit" name="submit" value="Sprawdź"/>
            </form>
            <ul>
                <!-- Skrypt 2 -->
                <?php 
                    if(isset($_POST["num"]) && $_POST["num"] != "")
                    {
                        $num = $_POST["num"];
                        $conn = mysqli_connect("localhost", "root", "", "egzamin");
                        $result = mysqli_query($conn, "SELECT z.imie AS 'Imię', z.nazwisko AS 'Nazwisko'
                        FROM zawodnik z
                        WHERE z.pozycja_id = $num;");
                        while($row = mysqli_fetch_assoc($result)){
                            $i = $row['Imię'];
                            $n = $row["Nazwisko"];
                            echo "<li>$i $n</li>";
                        }
                        mysqli_close($conn);
                    }
                ?>
            </ul>
        </section>
        <section id="prawy">
            <img src="zad1.png" alt="piłkarz"/>
            <p>Autor: 12345678912</p>
        </section>
    </section>
</body>
</html>