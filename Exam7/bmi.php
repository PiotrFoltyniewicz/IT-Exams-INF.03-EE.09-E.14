<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje BMI</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <header>
        <div id="logo">
            <img src="wzor.png" alt="wzór BMI"/>
        </div>
        <div id="baner">
            <h1>Oblicz swoje BMI</h1>
        </div>
    </header>
    <main id="glowny">
        <table>
            <tr>
                <th>Interpretacja BMI</th>
                <th>Wartość minimalna</th>
                <th>Wartosć maksymalna</th>
            </tr>
            <!-- SKRYPT 1 -->
            <?php
                $conn = mysqli_connect("localhost", "root", "", "egzamin2");
                $result = $conn->query("SELECT b.informacja, b.wart_min, b.wart_max FROM bmi b;");
                while($row = $result->fetch_row())
                {
                    $info = $row[0];
                    $min = $row[1];
                    $max = $row[2];
                    echo 
                    "<tr>
                        <td>$info</td>
                        <td>$min</td>
                        <td>$max</td>
                    </tr>";
                }
                $conn->close();
            ?>
        </table>
    </main>
    <section id="wrapper">
        <section id="lewy">
            <h2>Podaj wagę i wzrost</h2>
            <form name="formularz" method="POST" action="bmi.php">
                <label>
                    Waga: 
                    <input type="number" name="waga" min="1"/>
                </label>
                <br/>
                <label>
                    Wzrost w cm: 
                    <input type="number" name="wzrost" min="1"/>
                </label>
                <br/>
                <input type="submit" value="Oblicz i zapamiętaj wynik"/>
            </form>
            <!-- SKRYPT 2 -->
            <?php
                if((isset($_POST["waga"]) && $_POST["waga"] != null) && (isset($_POST["waga"]) && $_POST["wzrost"] != null))
                {
                    $waga = $_POST["waga"];
                    $wzrost = $_POST["wzrost"];
                    $conn = mysqli_connect("localhost", "root", "", "egzamin2");

                    $bmi = ($waga / ($wzrost * $wzrost)) * 10000;

                    echo 
                    "<p>Twoja waga: $waga; Twój wzrost $wzrost
                        <br/>
                        BMI wynosi: $bmi
                    </p>
                    ";

                    if($bmi <= 18)
                    {
                        $bmiId = 1;
                    }
                    else if ($bmi <= 25)
                    {
                        $bmiId = 2;
                    }
                    else if ($bmi <= 30)
                    {
                        $bmiId = 3;
                    }
                    else
                    {
                        $bmiId = 4;
                    }
                    $conn->query("INSERT INTO `wynik` (`id`, `bmi_id`, `data_pomiaru`, `wynik`) VALUES (NULL, '$bmiId', '". date("Y-m-d") ."', '$bmi');");
                    $conn->close();
                }
            ?>
        </section>
        <section id="prawy">
            <img src="rys1.png" alt="ćwiczenia"/>
        </section>
    </section>
    <footer id="stopka">
        <p>Autor: 12345678901 <a href="kwerendy.txt">Zobacz kwerendy</a></p>
    </footer>
</body>
</html>