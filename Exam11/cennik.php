<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Pokoje</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header id="baner1">
        <h2>WYNAJEM POKOI</h2>
    </header>
    <nav>
        <section id="menu1">
            <a href="index.html">POKOJE</a>
        </section>
        <section id="menu2">
            <a href="cennik.php">CENNIK</a>
        </section>
        <section id="menu3">
            <a href="kalkulator.html">KALKULATOR</a>
        </section>
    </nav>
    <div id="baner2"></div>
    <main>
        <section id="lewy">

        </section>
        <section id="srodkowy">
            <h1>Cennik</h1>
            <table>
                <?php 
                    // SKRYPT
                    $conn = mysqli_connect('localhost', 'root', '', 'wynajem');

                    $result = $conn->query('SELECT * FROM pokoje');
                    while($row = $result->fetch_row()){
                        $id = $row[0];
                        $nazwa = $row[1];
                        $cena = $row[2];
                        echo 
                        "<tr>
                            <td>$id</td>
                            <td>$nazwa</td>
                            <td>$cena</td>
                        </tr>";
                    }
                    
                    $conn->close();
                ?>
            </table>
        </section>
        <section id="prawy">
            
        </section>
    </main>
    <footer id="stopka">
        <p>Stronę opracował: 00000000000</p>
    </footer>
</body>
</html>