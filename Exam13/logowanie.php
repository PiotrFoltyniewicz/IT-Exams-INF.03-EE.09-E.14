<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" type="text/css" href="styl4.css">
</head>
<body>
    <header>
        <h1>Forum wielbicieli psów</h1>
    </header>
    <section id="lewy">
        <img src="obraz.jpg" alt="foksterier">
    </section>
    <section id="prawy1">
        <h1>Zapisz się</h1>
        <form action="logowanie.php" method="POST">
            <label>
                login:
                <input type="text" name="login">
            </label>
            <label>
                hasło:
                <input type="password" name="haslo">
            </label>
            <label>
                powtórz hasło:
                <input type="password" name="hasloPowt">
            </label>
            <input type="submit" value="Zapisz">
        </form>
        <div id="bledy">
            <?php
                // SKRYPT
                $correct = true;
                $conn = mysqli_connect('localhost', 'root', '', 'psy');
                if(strlen($_POST['login']) == 0 || strlen($_POST['haslo']) == 0 || strlen($_POST['hasloPowt']) == 0){
                    echo "<p>wypełnij wszystkie pola</p>";
                    $correct = false;
                }else{
                    $result = $conn->query("SELECT u.login
                                            FROM uzytkownicy u;");

                    while($row = $result->fetch_row()){
                        if($row[0] == $_POST['login']){
                            echo "<p>login występuje w bazie danych, konto nie zostało dodane</p>";
                            $correct = false;
                            break;
                        }
                    }
                
                    if($_POST['haslo'] != $_POST['hasloPowt']){
                        echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
                        $correct = false;
                    }

                    if($correct){
                        $passwd = sha1($_POST['haslo']);
                        $login = $_POST['login'];
                        $conn->query("INSERT INTO uzytkownicy (login, haslo) VALUES ('$login', '$passwd');");
                        echo "<p>Konto zostało dodane</p>";
                    }
                }
                $conn->close();
            ?>
        </div>
    </section>
    <section id="prawy2">
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>właścicieli psów</li>
            <li>weterynarzy</li>
            <li>tych, co chcą kupić psa</li>
            <li>tych, co lubią psy</li>
        </ol>
        <a href="regulamin.html">Przeczytaj regulamin forum</a>
    </section>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>