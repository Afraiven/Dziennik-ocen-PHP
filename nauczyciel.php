<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pibrus Synergia</title> 
    <link rel="stylesheet" href="style.css">   
</head>
<body onload="document.FormName.reset();">
<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "pibrus");
    $conn->query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
    $conn->query("SET CHARSET utf8");
    $login = $_SESSION['email'];
    $imie = $_SESSION['imie'];
    $nazwisko = $_SESSION['nazwisko'];

    if(isset($_POST['ocena']) && isset($_POST['komentarz'])) {
        if ($_POST['ide'] == "null" || is_null($_POST['ide'])) {
            $zapytanie = "INSERT INTO {$_POST['przedmiot']} VALUES({$_POST['ide']}, {$_POST['ocena']}, {$_POST['id_ucznia']}, '{$_POST['komentarz']}')";
        } else {
            $zapytanie = "UPDATE {$_POST['przedmiot']} SET ocena = {$_POST['ocena']}, id_ucznia = {$_POST['id_ucznia']}, komentarz = '{$_POST['komentarz']}' WHERE id = {$_POST['ide']};";
        }
        mysqli_query($conn, $zapytanie);
    }
    


    echo "<h1>Zalogowano z konta nauczyciela: ", $login, "<br>", $imie, " ", $nazwisko, "</h1><h3>Naciśnij na wybraną ocenę aby ją edytować</h3>";
    echo "<div class='oceny'>Oceny z j.polskiego<ul>";
    $query = mysqli_query($conn, "SELECT * FROM polski JOIN uczniowie ON polski.id_ucznia = uczniowie.id ORDER BY uczniowie.nazwisko;");
    while ($row = mysqli_fetch_row($query)) {
        $fun = "edit('polski',{$row[0]},{$row[1]},{$row[4]},'{$row[3]}')";
        echo "<li onClick=".$fun.">".$row[1]." - ". $row[5]." ".$row[6]." - ".$row[3]."</li>";
    }
    echo "</ul></div>";
    
    echo "<div class='oceny'>Oceny z matematyki<ul>";
    $query = mysqli_query($conn, "SELECT * FROM matematyka JOIN uczniowie ON matematyka.id_ucznia = uczniowie.id ORDER BY uczniowie.nazwisko;");
    while ($row = mysqli_fetch_row($query)) {
        $fun = "edit('matematyka',{$row[0]},{$row[1]},{$row[4]},'{$row[3]}')";
        echo "<li onClick=".$fun.">".$row[1]." - ". $row[5]." ".$row[6]." - ".$row[3]."</li>";
    }
    echo "</ul></div>";
    echo "<div class='oceny'>Oceny z informatyki<ul>";
    $query = mysqli_query($conn, "SELECT * FROM informatyka JOIN uczniowie ON informatyka.id_ucznia = uczniowie.id ORDER BY uczniowie.nazwisko;");
    while ($row = mysqli_fetch_row($query)) {
        $fun = "edit('informatyka',{$row[0]},{$row[1]},{$row[4]},'{$row[3]}')";
        echo "<li onClick=".$fun.">".$row[1]." - ". $row[5]." ".$row[6]." - ".$row[3]."</li>";
    }
    echo "</ul></div>";
    echo "<div class='oceny'>Oceny z wf<ul>";
    $query = mysqli_query($conn, "SELECT * FROM wf JOIN uczniowie ON wf.id_ucznia = uczniowie.id ORDER BY uczniowie.nazwisko;");
    while ($row = mysqli_fetch_row($query)) {
        $fun = "edit('wf',{$row[0]},{$row[1]},{$row[4]},'{$row[3]}')";
        echo "<li onClick=".$fun.">".$row[1]." - ". $row[5]." ".$row[6]." - ".$row[3]."</li>";
    }
    echo "</ul></div>";
    echo "<div class='oceny'>Oceny z angielskiego<ul>";
    $query = mysqli_query($conn, "SELECT * FROM angielski JOIN uczniowie ON angielski.id_ucznia = uczniowie.id ORDER BY uczniowie.nazwisko;");
    while ($row = mysqli_fetch_row($query)) {
        $fun = "edit('angielski',{$row[0]},{$row[1]},{$row[4]},'{$row[3]}')";
        echo "<li onClick=".$fun.">".$row[1]." - ". $row[5]." ".$row[6]." - ".$row[3]."</li>";
    }
    echo "</ul></div>";


?>
<script>
    document.getElementById("ide").value = "null";
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    function edit(przedmiot, id, ocena, uczen, komentarz) {
        console.log(przedmiot, id, ocena, uczen, komentarz);
        document.getElementById("przedmiot").value = przedmiot;
        document.getElementById("ocena").value = ocena;
        document.getElementById("id_ucznia").value = uczen;
        document.getElementById("komentarz").value = komentarz;
        document.getElementById("ide").value = id;

    }
</script>
<form action="nauczyciel.php" method="POST">
    <input class="hidden" type="text" name="ide" id="ide" value="null">
    <label class="lab_form" for="przedmiot">Nazwa przedmiotu</label><br>
    <select class="nauczyciel_form" name="przedmiot" id="przedmiot">
        <option value="polski">J. polski</option>
        <option value="angielski">J. angielski</option>
        <option value="matematyka">Matematyka</option>
        <option value="wf">WF</option>
        <option value="informatyka">Informatyka</option>
    </select>

    <label class="lab_form" for="">Ocena</label><br>
    <input required class="nauczyciel_form" type="text" name="ocena" id="ocena">

    <label class="lab_form" for="">Uczeń</label><br>
    <select class="nauczyciel_form" name="id_ucznia" id="id_ucznia">
        <option value="1">Filip Antoniak</option>
        <option value="2">Jacek Wardęga</option>
        <option value="3">Grzegorz Pentner</option>
    </select>
    <label class="lab_form" for="">Komentarz</label><br>
    <input required class="nauczyciel_form" type="text" name="komentarz" id="komentarz">
    <input id="zaloguj" type="submit" value="Zatwierdź">
</form>
</body>
</html>