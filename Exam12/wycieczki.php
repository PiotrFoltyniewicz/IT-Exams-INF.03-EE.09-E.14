<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki i urlopy</title>
    <link rel="stylesheet" type="text/css" href="styl3.css">
</head>
<body>
    <header id="baner">
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <section id="lewo">
        <h2>KONTAKT</h2>
        <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
        <p>telefon: 555666777</p>
    </section>
    <main id="srodek">
        <h2>GALERIA</h2>
        <div id="zdjecia">
        <?php
            // SKRYPT  1
            $conn = mysqli_connect('localhost', 'root', '', 'egzamin3');
            $result = $conn->query('SELECT z.nazwaPliku, z.podpis
                                    FROM zdjecia z
                                    ORDER BY z.podpis;');

            while($row = $result->fetch_row()){
                $nazwa = $row[0];
                $podpis = $row[1];
                echo "<img src=\"$nazwa\" alt=\"$podpis\">";
            }
            $conn->close();
        ?>
        </div>
    </main>
    <aside id="prawo">
        <h2>PROMOCJE</h2>
        <table>
            <tr>
                <td>Jesień</td>
                <td>Grupa 4+</td>
                <td>Grupa 10+</td>
            </tr>
            <tr>
                <td>5%</td>
                <td>10%</td>
                <td>15%</td>
            </tr>
        </table>
    </aside>
    <section id="dane">
        <h2>LISTA WYCIECZEK</h2>
        <?php
            // SKRYPT 2

            $conn = mysqli_connect('localhost', 'root', '', 'egzamin3');
            $result = $conn->query('SELECT w.id, w.dataWyjazdu, w.cel, w.cena
                                    FROM wycieczki w
                                    WHERE w.dostepna = TRUE;');
            echo "<p>";
            while($row = $result->fetch_row()){
                $id = $row[0];
                $dataWyjazdu = $row[1];
                $cel = $row[2];
                $cena = $row[3];
                echo "$id. $dataWyjazdu, $cel, cena: $cena <br>";
            }
            echo "</p>";
            $conn->close();
        ?>
    </section>
    <footer id="stopka">
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>