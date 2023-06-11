<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Hurtownia papiernicza</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <section class="baner">
        <h1>W naszej hurtowni kupisz najtaniej</h1>
    </section>
    <section class="lewy">
        <h3>Ceny wybranych artykułów w hurtowni:</h3>
        <table>
            <?php
                $conn = new mysqli("localhost","root","","sklep");
                $q1 = "SELECT nazwa,cena FROM towary LIMIT 4;";
                $res1 = $conn->query($q1);
                while($row1 = $res1->fetch_row())
                {
                    print "<tr>";
                    print "<td>$row1[0]</td>";
                    print "<td>$row1[1]</td>";
                    print "</tr>";
                }
            ?>
        </table>
    </section>
    <section class="srodkowy">
        <h3>Ile będą kosztować Twoje zakupy?</h3>
        <form action="index.php" method="post">
            wybierz artykuł
            <select name="nazwa">
                <option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
                <option value="Zeszyt 32 kartki">Zeszyt 32 kartki</option>
                <option value="Cyrkiel">Cyrkiel</option>
                <option value="Linijka 30 cm">Linijka 30 cm</option>
                <option value="Ekierka">Ekierka</option>
                <option value="Linijka 50 cm">Linijka 50 cm</option>
            </select>
            <br>
            liczba sztuk: <input type="number" name="ilosc" value="1">
            <br>
            <button type="submit" name="submit">OBLICZ</button>
        </form>
        <?php
            if(isset($_POST['submit'])) {
                $nazwa = $_POST['nazwa'];
                $ilosc = $_POST['ilosc'];

                $q2 = "SELECT cena FROM towary WHERE nazwa = '$nazwa';";
                $res2 = $conn->query($q2);
                while($row2 = $res2->fetch_row())
                {
                    $kwota = round($row2[0] * $ilosc,1);
                    print $kwota;
                }
            }
        ?>
    </section>
    <section class="prawy">
        <img src="zakupy2.png" alt="hurtownia">
        <h3>Kontakt</h3>
        <p>telefon <br> 111222333 <br> e-mail: <br> <a href="mailto:hurt@wp.pl">hurt@wp.pl</a></p>
    </section>
    <section class="stopka">
        <h4>Witryne wykonał RumianEK</h4>
    </section>
</body>
</html>