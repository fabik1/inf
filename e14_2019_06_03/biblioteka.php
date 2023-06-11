<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Biblioteka miejska</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="baner">
        <h2>Miejska Biblioteka Publiczna w Książkowicach</h2>
    </header>
    <main class="flex">
        <section class="lewy">
            <h3>W naszych zbiorach znajdziesz dzieła następujących autorów:</h3>
            <ul>
                <?php
                    $conn = new mysqli("localhost","root","","biblioteka");
                    $q1 = "SELECT imie,nazwisko FROM autorzy;";
                    $res1 = $conn->query($q1);
                    while($row1 = $res1->fetch_row())
                    {
                        print "<li>$row1[0] $row1[1]</li>";
                    }
                ?>
            </ul>
        </section>
        <section class="srodkowy">
            <h3>Dodaj nowego czytelnika</h3>
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
                if(isset($_POST['submit'])) {
                    $imie = $_POST['imie'];
                    $nazwisko = $_POST['nazwisko'];
                    $rokUrodzenia = $_POST['rokUrodzenia'];

                    $kodCzyt = strtoupper(substr($imie,0,2).substr($nazwisko,0,2)).substr($rokUrodzenia,-2);
                    
                    $q2 = "INSERT INTO czytelnicy VALUES (NULL,'$imie','$nazwisko','$kodCzyt');";
                    $conn->query($q2);

                    print "Czytelnik: $imie $nazwisko został dodany do bazy danych";
                }
                $conn->close();
            ?>
        </section>
        <section class="prawy">
            <img src="biblioteka.png" alt="książki">
            <h4>ul. Czytelnicza 25 <br> 12-120 Książkowice <br> tel.: 123123123 <br> e-mail: <a href="mailto:biuro@biblioteka.pl">biuro@biblioteka.pl</a></h4>
        </section>
    </main>
    <footer class="stopka">
        <p>Projekt strony: RumianEK</p>
    </footer>
</body>
</html>