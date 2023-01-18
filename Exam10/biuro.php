<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Wycieczki krajoznawcze</title>
        <link rel="stylesheet" type="text/css" href="styl4.css">
    </head>
    <body>
        <header>
            <h1>WITAMY W BIURZE PODRÓŻY</h1>
        </header>
        <section id="dane">
            <h3>ARCHIWUM WYCIECZEK</h3>
            <?php
                //SKRYPT 1
                $conn = mysqli_connect("localhost","root","","egzamin4");

                $result = $conn->query("SELECT w.id, w.cel, w.cena
                                        FROM wycieczki w
                                        WHERE w.dostepna = False;");

                while($row = $result->fetch_row()){
                    echo "$row[0]. $row[1], cena: $row[2]<br/>";
                }

                $conn->close();
            ?>
        </section>
        <main>
            <section id="lewy">
                <h3>NAJTANIEJ...</h3>
                <table>
                    <tr>
                        <td>Włochy</td>
                        <td>od 1200 zł</td>
                    </tr>
                    <tr>
                        <td>Francja</td>
                        <td>od 1200 zł</td>
                    </tr>
                    <tr>
                        <td>Hiszpania</td>
                        <td>od 1400 zł</td>
                    </tr>
                </table>
            </section>
            <section id="srodkowy">
                <h3>TU BYLIŚMY</h3>
                <?php
                    //SKRYPT 2
                    $conn = mysqli_connect("localhost","root","","egzamin4");

                    $result = $conn->query("SELECT z.nazwaPliku, z.podpis
                                            FROM zdjecia z
                                            ORDER BY 2 DESC;");
    
                    while($row = $result->fetch_row()){
                        echo "<img src=\"$row[0]\" alt=\"$row[1]\">";
                    }
    
                    $conn->close();
                ?>
            </section>
            <section id="prawy">
                <h3>SKONTAKTUJ SIĘ</h3>
                <a href="mailto:wycieczki@wycieczki.pl">napisz do nas</a>
                <p>telefon: 555666777</p>
            </section>
        </main>
        <footer>
            <p>Stronę wykonał: 00000000000</p>
        </footer>
    </body>
</html>