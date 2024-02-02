<!DOCTYPE html>

<?php

$c_name = 'cookie1';
$c_value = 'set';
$c_expire = time() + 2*60*60;

setcookie($c_name, $c_value, $c_expire);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>

<body>

    <header>

        <section id="header_left">

            <img src="./zad5.png" alt="logo lotnisko">

        </section>

        <section id="header_center">

            <h1>Przyloty</h1>

        </section>

        <section id="header_right">

            <h3>przydatne linki</h3>
            <a href="../kwerendy.txt">Pobierz...</a>

        </section>

    </header>

    <main>

        <table>

            <tr>
                <th>czas</th>
                <th>kierunek</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>

            <!-- script1 -->

            <?php

            $dbConn = new mysqli('localhost', 'root', '', 'egzamin');

            $sql1 = "SELECT `czas`, `kierunek`, `nr_rejsu`, `status_lotu` FROM `przyloty` ORDER BY `czas`; ";
            $sql1_resault = $dbConn->query($sql1);

            while ($data1 = mysqli_fetch_array($sql1_resault, MYSQLI_BOTH)) {

                $time = $data1['czas'];
                $direction = $data1['kierunek'];
                $fly_number = $data1['nr_rejsu'];
                $status = $data1['status_lotu'];

                echo <<<TX

                <tr>
                
                    <td>$time</td>
                    <td>$direction</td>
                    <td>$fly_number</td>
                    <td>$status</td>
                
                </tr>

                TX;
            }




            $dbConn->close();


            ?>

        </table>

    </main>

    <footer>

        <section id="footer_left">

            <?php

            if ($_COOKIE) {
                if ($_COOKIE['cookie1'] == 'set') {

                    echo "<p><i>Witaj ponownie na stronie lotniska</i></p>";
                }
            } else {

                echo "<p><b>Dzień dobry! Strona lotniska używa ciasteczek</b></p>";
            }

            ?>

        </section>

        <section id="footer_right">

            Autor: 00000000000

        </section>

    </footer>

</body>

</html>