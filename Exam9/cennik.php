<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Wynajem pokoi</title>
        <link rel="stylesheet" href="styl2.css">
    </head>
    <body>
        <header id="baner">
            <h1>Pensjonat pod dobrym humorem</h1>
        </header>
        <section id="lewy">
            <a href="index.html">GŁÓWNA</a>
            <img src="1.jpg" alt="pokoje"/>
        </section>
        <section id="srodkowy">
            <a href="cennik.php">CENNIK</a>
            <table>
                <?php
                    // SKRYPT
                    $conn = mysqli_connect('localhost','root','','wynajem');

                    $result = $conn->query("SELECT * FROM pokoje");

                    while($row = $result->fetch_row()){
                        echo "
                        <tr>
                            <td>$row[0]</td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                        </tr>";
                    }

                    $conn->close();
                ?>
            </table>
        </section>
        <section id="prawy">
            <a href="kalkulator.html">KALKULATOR</a>
            <img src="3.jpg" alt="pokoje"/>
        </section>
        <footer id="stopka">
            <p>Stronę opracował: 00000000000</p>
        </footer>
    </body>
</html>