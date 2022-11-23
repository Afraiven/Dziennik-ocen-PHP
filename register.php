<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <script>
    document.getElementById("ide").value = "null";
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>

    <h1>&pi;brus Synergia</h1>
    <h2> Stwórz konto do systemu</h2>

    <div id="switch">
        <label class="lab_form" for="nauczyciel">Jestem: </label>
        <select class="log_form" name="nauczyciel" id="nauczyciel">
            <option value="uczniowie">uczniem</option>
            <option value="nauczyciele">nauczycielem</option>
        </select>
    </div>
    
    <form id="form_uczniowie" action="register.php" method="POST">
    <h2>Rejestracja</h2>
        <input type="text" class="hidden" value="uczniowie" name="type" id="type">
        <label class="log_register_form" for="imie">Imię:</label><br>
        <input required class="nauczyciel_form" type="text" id="imie" name="imie" placeholder="Jan">

        <label class="log_register_form" for="nazwisko">Nazwisko:</label><br>
        <input required class="nauczyciel_form" type="text" id="nazwisko"  name="nazwisko" placeholder="Kowalski">

        <label class="log_register_form" for="email">Email:</label><br>
        <input required class="nauczyciel_form" type="email" id="email"  name="email" placeholder="jan.kowalski@gmail.com">
        
        <label class="log_register_form" for="haslo">Haslo:</label><br>
        <input required class="nauczyciel_form" type="password" id="haslo"  name="haslo" placeholder="Podaj haslo">
       
        <label class="log_register_form" for="klasa">Wybierz klase:</label>
        <select class="log_form" name="klasa" id="klasa">
            <option value="4a">4a</option>
            <option value="4b">4b</option>
            <option value="1a">1a</option>
            <option value="2a">2a</option>
            <option value="3a">3a</option>
        </select>
        <input id="zaloguj" type="submit" value="Zarejestruj się">
        <h4>Masz już konto? <a href="http://localhost/pibrus/index.php">Zaloguj się!</a></h4>
    </form>
    
    <form class="hidden" id="form_nauczyciele" action="register.php" method="POST">
        <h2>Rejestracja</h2>
        <input type="text" class="hidden" value="nauczyciele" name="type" id="type">
        <label class="log_register_form" for="imie">Imię:</label><br>
        <input required class="nauczyciel_form" type="text" id="imie" name="imie" placeholder="Jan">

        <label class="log_register_form" for="nazwisko">Nazwisko:</label><br>
        <input required class="nauczyciel_form" type="text" id="nazwisko"  name="nazwisko" placeholder="Kowalski">

        <label class="log_register_form" for="email">Email:</label><br>
        <input required class="nauczyciel_form" type="email" id="email"  name="email" placeholder="jan.kowalski@gmail.com">
        
        <label class="log_register_form" for="haslo">Haslo:</label><br>
        <input required class="nauczyciel_form" type="password" id="haslo"  name="haslo" placeholder="Podaj haslo">
       
        <input id="zaloguj" type="submit" value="Zarejestruj się">
        <h4>Masz już konto? <a href="http://localhost/pibrus/index.php">Zaloguj się!</a></h4>
    </form>

    <?php 
        if(session_id() == '') {
            session_start();
        }
        if(isset($_POST['email'])) {
            if ($_POST['type'] == "uczniowie") {
                $conn = mysqli_connect("localhost", "root", "", "pibrus");
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['haslo'] = $_POST['haslo'];
                $login = $_SESSION['email'];
                $imie = $_POST['imie'];
                $nazwisko = $_POST['nazwisko'];
                $password = $_SESSION['haslo'];
                $klasa = $_POST['klasa'];
                $_SESSION['type'] = $_POST['type'];

                $query = mysqli_query($conn, "INSERT INTO uczniowie VALUES(null, '$imie', '$nazwisko', '$login', '$password', '$klasa');");
                
                $_SESSION['status'] = "Zarejestrowano. Teraz możesz się zalogować";
                header("Location: index.php");
                
                mysqli_close($conn);
                
        } else {
            $conn = mysqli_connect("localhost", "root", "", "pibrus");
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['haslo'] = $_POST['haslo'];
            $login = $_SESSION['email'];
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $password = $_SESSION['haslo'];
            $_SESSION['type'] = $_POST['type'];

            $query = mysqli_query($conn, "INSERT INTO nauczyciele VALUES(null, '$imie', '$nazwisko', '$login', '$password');");
            
            $_SESSION['status'] = "Zarejestrowano. Teraz możesz się zalogować";
            header("Location: index.php");
            
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