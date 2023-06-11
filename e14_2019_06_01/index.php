<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sklep papierniczy</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header class="baner">
        <h1>W naszym sklepie internetowym kupisz najtaniej</h1>
    </header>
    <main class="flex">
        <section class="lewy">
            <h3>Promocja 15% obejmuje artykuły:</h3>
            <ul>
                <?php
                    $conn = new mysqli("localhost","root","","sklep");
                    $q1 = "SELECT nazwa FROM towary WHERE promocja = 1;";
                    $res1 = $conn->query($q1);
                    while($row1 = $res1->fetch_row())
                    {
                        print "<li>$row1[0]</li>";
                    }
                ?>
            </ul>
        </section>
        <section class="srodkowy">
            <h3>Cena wybranego artykułu w promocji</h3>
            <form action="index.php" method="post">
                <select name="nazwa">
                    <option value="Gumka do mazania">Gumka do mazania</option>
                    <option value="Cienkopis">Cienkopis</option>
                    <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
                    <option value="Markery 4 szt.">Markery 4 szt.</option>
                </select>
                <button type="submit" name="submit">WYBIERZ</button>
            </form>
           <?php
                if(isset($_POST['submit'])) {
                    $nazwa = $_POST['nazwa'];
                    $q2 = "SELECT cena FROM towary WHERE nazwa = '$nazwa';";
                    $res2 = $conn->query($q2);
                    while($row2 = $res2->fetch_row())
                    {
                        $cenaPromocyjna = round($row2[0] * 0.85,2);
                        print $cenaPromocyjna;
                    }
                }
                $conn->close();
           ?>
        </section>
        <section class="prawy">
            <h3>Kontakt</h3>
            <p>telefon 123123123 <br> e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
            <img src="promocja2.png" alt="promocja">
        </section>
    </main>
    <footer class="stopka">
        <h4>Autor strony: RumianEK</h4>
    </footer>
</body>
</html>