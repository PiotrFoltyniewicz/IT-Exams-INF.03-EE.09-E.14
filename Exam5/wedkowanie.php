<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klub wędkowania</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <header>
        <h2>Wędkuj z nami!</h2>
    </header>
    <main>
        <section id="left">
            <img src="ryba2.jpg" alt="Szczupak"/>
        </section>
        <section id="right">
            <h3>Ryby spokojnego żeru (białe)</h3>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "wedkowanie2");

                $result = $conn->query("SELECT id, nazwa, wystepowanie
                                        FROM Ryby
                                        WHERE styl_zycia = 2;");

                while($row = $result->fetch_row()){
                    $id = $row[0];
                    $nazwa = $row[1];
                    $wystepowanie = $row[2];

                    echo "$id. $nazwa, występuje w: $wystepowanie<br/>";
                }
                $conn->close();
            ?>
            <ol>
                <li><a href="https://wedkuje.pl" target="_blank">Odwiedź także</a></li>
                <li><a href="http://www.pzw.org.pl" target="_blank">Polski Związek Wędkarski</a></li>
            </ol>
        </section>
    </main>
    <footer>
        <a>Stronę wykonał: 12345678901</a>
    </footer>
</body>
</html>