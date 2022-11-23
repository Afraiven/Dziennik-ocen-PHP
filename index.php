<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pibrus synergia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        if(session_id() == '') {
            session_start();
        }
        if (isset($_SESSION['status'])) {
            echo "<div id='status'>".$_SESSION["status"]."</div>";
            unset($_SESSION["status"]);
            unset($_SESSION["failed"]);
        }
    ?>
    <h1>&pi;brus Synergia</h1>
    <div id="switch">
        <label class="lab_form" for="nauczyciel">Jestem: </label>
        <select class="log_form" name="nauczyciel" id="nauczyciel">
            <option value="uczniowie">uczniem</option>
            <option value="nauczyciele">nauczycielem</option>
        </select>
    </div>
   
    <!-- -----------------------        uczen          ------------------------------------------ -->
    <form id="form_uczniowie" method="post" action="index.php">
        <h2> Zaloguj do systemu Synergia</h2>
        <p>Konto ucznia: filip.antoniak99@gmail.com, haslo: haslo, klasa 4a</p>

        <input type="text" class="hidden" value="uczniowie" name="type" id="type">
        <label class="lab_form" for="email">Login (email)</label><br>
        <input class="log_form" type="text" required="required" name="email" id="email"><div class="iconbc">
            <img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" alt="">
        </div><br>
        <label class="lab_form" for="password">Hasło</label><br>
        <input class="log_form" type="password" required="required" name="password" id="password"><div class="iconbc">
            <img src="https://cdn-icons-png.flaticon.com/512/483/483408.png" alt="">
        </div><br>
        <select class="log_form" name="klasa" id="klasa">
            <option value="4a">4a</option>
            <option value="4b">4b</option>
            <option value="1a">1a</option>
            <option value="2a">2a</option>
            <option value="3a">3a</option>
        </select>
    
        <?php 
            if(session_id() == '') {
                session_start();
            }
            if (isset($_SESSION['failed']) && !isset($_SESSION['status'])) {
                echo "<span>".$_SESSION["failed"]."</span>";
                unset($_SESSION["failed"]);
            }
        ?>
        <input id="zaloguj" type="submit" value="Zaloguj">
        <h4>Nie masz konta? <a href="http://localhost/pibrus/register.php">Zarejetruj się!</a></h4>
        <p>Formularz logowania do systemu Synergia. Login: filip.antoniak99@gmail.com, haslo: haslo, klasa 4a</p>
    </form>
<!-- --------------------------------- nauczyciel------------------------------------ -->
    <form class="hidden" id="form_nauczyciele" method="post" action="index.php">
        <h2> Zaloguj do systemu Synergia</h2>
        <p>Konto nauczyciela: JanSuperNauczyciel@gmail.com haslo: haslo123</p>

        <input type="text" class="hidden" value="nauczyciele" name="type" id="type">
        <label class="lab_form" for="email">Login (email)</label><br>
        <input class="log_form" type="text" required="required" name="email" id="email"><div class="iconbc">
            <img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" alt="">
        </div><br>
        <label class="lab_form" for="password">Hasło</label><br>
        <input class="log_form" type="password" required="required" name="password" id="password"><div class="iconbc">
            <img src="https://cdn-icons-png.flaticon.com/512/483/483408.png" alt="">
        </div><br>
        
        <?php 
            if(session_id() == '') {
                session_start();
            }
            if (isset($_SESSION['failed']) && !isset($_SESSION['status'])) {
                echo "<span>".$_SESSION["failed"]."</span>";
                unset($_SESSION["failed"]);
            }
        ?>
        <input id="zaloguj" type="submit" value="Zaloguj">
        <h4>Nie masz konta? <a href="http://localhost/pibrus/register.php">Zarejetruj się!</a></h4>
        <p>Formularz logowania do systemu Synergia. JanSuperNauczyciel@gmail.com haslo123
</p>
    </form>

    <?php
        if(isset($_POST['email'])) {
            if ($_POST['type'] == "uczniowie") {
                $conn = mysqli_connect("localhost", "root", "", "pibrus");
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];
                $login = $_SESSION['email'];
                $password = $_SESSION['password'];
                $klasa = $_POST['klasa'];
                $_SESSION['type'] = $_POST['type'];

                $query = mysqli_query($conn, "SELECT * FROM uczniowie WHERE email='$login' AND haslo='$password' AND klasa='$klasa';");
                if(mysqli_num_rows($query)) {
                    unset($_SESSION['failed']);
                    while($row = mysqli_fetch_row($query)) {
                        $_SESSION['imie'] = $row[1];
                        $_SESSION['nazwisko'] = $row[2];
                        $_SESSION['id_ucznia'] = $row[0];
                        $_SESSION['klasa'] = $row[5];
                    }
                    
                    header("Location: oceny.php");
                } else {
                    $_SESSION['failed'] = "Nie udało się zalogować, sprawdź poprawność danych";
                }
                mysqli_close($conn);
            }
            else {
                $conn = mysqli_connect("localhost", "root", "", "pibrus");
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];
                $login = $_SESSION['email'];
                $password = $_SESSION['password'];
                $_SESSION['type'] = $_POST['type'];
                
                $query = mysqli_query($conn, "SELECT * FROM nauczyciele WHERE email='$login' AND haslo='$password';");
                if(mysqli_num_rows($query)) {
                    unset($_SESSION['failed']);
                    while($row = mysqli_fetch_row($query)) {
                        $_SESSION['imie'] = $row[1];
                        $_SESSION['nazwisko'] = $row[2];
                    }
                    
                    header("Location: nauczyciel.php");
                } else {
                    $_SESSION['failed'] = "Nie udało się zalogować, sprawdź poprawność danych";
                }
                mysqli_close($conn);
            }
        }
    ?>

    <script>
        let el = document.getElementById("nauczyciel");
        console.log(el.value)
        el.addEventListener('input', function (evt) {
            if (el.value == "uczniowie") {
                document.getElementById("form_uczniowie").classList.add("visible");
                document.getElementById("form_uczniowie").classList.remove("hidden");
                
                document.getElementById("form_nauczyciele").classList.add("hidden");
                document.getElementById("form_nauczyciele").classList.remove("visible");
            } else {
                document.getElementById("form_uczniowie").classList.add("hidden");
                document.getElementById("form_uczniowie").classList.remove("visible");

                document.getElementById("form_nauczyciele").classList.add("visible");
                document.getElementById("form_nauczyciele").classList.remove("hidden");
            }
        });
    </script>
</body>
</html>