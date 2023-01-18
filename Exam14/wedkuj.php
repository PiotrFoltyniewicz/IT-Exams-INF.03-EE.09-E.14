<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowaie</title>
    <link rel="stylesheet" type="text/css" href="styl_1.css">
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <main>
    <section id="lewy1">
        <h3>Ryby zamieszkujące rzeki</h3>
        <ol>
        <?php
            // Skrypt 1
            $conn = mysqli_connect('localhost', 'root', '', 'wedkowanie');

            $result = $conn->query('SELECT r.nazwa, l.akwen, l.wojewodztwo
                                    FROM ryby r
                                    JOIN lowisko l
                                    ON r.id = l.Ryby_id
                                    WHERE l.rodzaj = 3;');
            while($row = $result->fetch_row())
            {
                $nazwa = $row[0];
                $akwen = $row[1];
                $wojewodztwo = $row[2];

                echo "<li>$nazwa pływa w rzece $akwen, $wojewodztwo</li>";
            }
            $conn->close();
        ?>
        </ol>
    </section>
    <section id="lewy2">
        <h3>Ryby drapieżne naszych wód</h3>
        <table>
            <tr>
                <th>L.p.</th>
                <th>Gatunek</th>
                <th>Występowanie</th>
            </tr>
            <?php
                // Skrypt 2
                $conn = mysqli_connect('localhost', 'root', '', 'wedkowanie');

                $result = $conn->query('SELECT r.id, r.nazwa, r.wystepowanie
                                        FROM ryby r
                                        WHERE r.styl_zycia = 1;');
                while($row = $result->fetch_row())
                {
                    $id = $row[0];
                    $nazwa = $row[1];
                    $wystepowanie = $row[2];
    
                    echo "<tr>
                            <td>$id</td>
                            <td>$nazwa</td>
                            <td>$wystepowanie</td>
                        </tr>";
                }
                $conn->close();
            ?>
        </table>
    </section>
    </main>
    <aside>
        <img src="ryba1.jpg" alt="Sum">
        <br>
        <a href="kwerendy.txy">Pobierz kwerendy</a>
    </aside>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>