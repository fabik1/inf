<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="baner">
        <h2>Miejska Biblioteka Publiczna w Książkowicach</h2>
    </section>
    <section class="lewy">
        <h2>Dodaj czytelnika</h2>
        <form action="biblioteka.php" method="post">
            imię: <input type="text" name="imie">
            <br>
            nazwisko: <input type="text" name="nazwisko">
            <br>
            rok urodzenia: <input type="number" name="rokUrodzenia">
            <br>
            <button type="submit" name="submit">DODAJ</button>
        </form>
        <?php
            $conn = new mysqli("localhost","root","","biblioteka");
            if(isset($_POST['submit'])) {
                $imie = $_POST['imie'];
                $nazwisko = $_POST['nazwisko'];
                $rokUrodzenia = $_POST['rokUrodzenia'];

                $kodCzyt = strtolower(substr($imie,0,2).substr($rokUrodzenia,-2).substr($nazwisko,0,2));

                $q1 = "INSERT INTO czytelnicy VALUES (NULL,'$imie','$nazwisko','$kodCzyt');";
                $conn->query($q1);

                print "Czytelnik: $nazwisko został dodany do bazy danych";
            }
        ?>
    </section>
    <section class="srodkowy">
        <img src="biblioteka.png" alt="biblioteka">
        <h4>ul. Czytelnicza 25 <br> 12-120 Książkowice <br> tel.: 123123123 <br> e-mail: <a href="mailto:biuro@bib.pl">biuro@bib.pl</a></h4>
    </section>
    <section class="prawy">
        <h3>Nasi czytelnicy:</h3>
        <ul>
            <?php
                $q2 = "SELECT imie,nazwisko FROM czytelnicy;";
                $res2 = $conn->query($q2);
                while($row2 = $res2->fetch_row())
                {
                    print "<li>$row2[0] $row2[1]</li>";
                }
                $conn->close();
            ?>
        </ul>
    </section>
    <section class="stopka">
        <p>Projekt witryny: RumianEK</p>
    </section>
</body>
</html>