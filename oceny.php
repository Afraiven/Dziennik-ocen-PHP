<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pibrus Synergia</title>    
    <link rel="stylesheet" href="style.css">

</head>
<body>
<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "pibrus");
    $login = $_SESSION['email'];
    $imie = $_SESSION['imie'];
    $nazwisko = $_SESSION['nazwisko'];
    $klasa = $_SESSION['klasa'];
    


    echo "<h1>Zalogowano jako ", $login, "<br>", $imie, " ", $nazwisko, " z klasy ", $klasa, "</h1>";
    $id_ucznia = $_SESSION['id_ucznia'];
    $query = mysqli_query($conn, "SELECT * FROM polski WHERE id_ucznia='$id_ucznia';");
    $sum1 = 0;
    if(mysqli_num_rows($query)) {
        echo "<div class='oceny'>Oceny z j.polskiego";
        echo "<ul>";
        while($row = mysqli_fetch_row($query)) {
           echo "<li>",$row[1],"</li>";
           $sum1 = $sum1 + $row[1];
        }
        $sum1 = $sum1/mysqli_num_rows($query);
        echo "</ul>Średnia z j.polskiego to: ", $sum1;
        echo "</div>";
        
    }
    $query = mysqli_query($conn, "SELECT * FROM informatyka WHERE id_ucznia='$id_ucznia';");
    $sum2 = 0;
    if(mysqli_num_rows($query)) {
        echo "<div class='oceny'>Oceny z informatyki";
        echo "<ul>";
        while($row = mysqli_fetch_row($query)) {
           echo "<li>",$row[1],"</li>";
           $sum2 = $sum2 + $row[1];
        }
        $sum2 = $sum2/mysqli_num_rows($query);
        echo "</ul>Średnia z informatyki to: ", $sum2;
        echo "</div>";
        
    }
    $query = mysqli_query($conn, "SELECT * FROM matematyka WHERE id_ucznia='$id_ucznia';");
    $sum3 = 0;
    if(mysqli_num_rows($query)) {
        echo "<div class='oceny'>Oceny z matematyki";
        echo "<ul>";
        while($row = mysqli_fetch_row($query)) {
           echo "<li>",$row[1],"</li>";
           $sum3 = $sum3 + $row[1];
        }
        $sum3 = $sum3/mysqli_num_rows($query);
        echo "</ul>Średnia z matematyki to: ", $sum3;
        echo "</div>";
        
    }
    $query = mysqli_query($conn, "SELECT * FROM wf WHERE id_ucznia='$id_ucznia';");
    $sum4 = 0;
    if(mysqli_num_rows($query)) {
        echo "<div class='oceny'>Oceny z wf`u";
        echo "<ul>";
        while($row = mysqli_fetch_row($query)) {
           echo "<li>",$row[1],"</li>";
           $sum4 = $sum4 + $row[1];
        }
        $sum4 = $sum4/mysqli_num_rows($query);
        echo "</ul>Średnia z wf`u to: ", $sum4;
        echo "</div>";
        
    }
    $query = mysqli_query($conn, "SELECT * FROM angielski WHERE id_ucznia='$id_ucznia';");
    $sum5 = 0;
    if(mysqli_num_rows($query)) {
        echo "<div class='oceny'>Oceny z angielskiego";
        echo "<ul>";
        while($row = mysqli_fetch_row($query)) {
           echo "<li>",$row[1],"</li>";
           $sum5 = $sum5 + $row[1];
        }
        $sum5 = $sum5/mysqli_num_rows($query);
        echo "</ul>Średnia z j.angielskiego to: ", $sum5;
        echo "</div>";
        
    }
    $srednia = ($sum1+$sum2+$sum3+$sum4+$sum5)/5;
    echo "<h1>Średnia wszystkich przedmiotów to ", $srednia;
    mysqli_close($conn);
?>

</body>
</html>