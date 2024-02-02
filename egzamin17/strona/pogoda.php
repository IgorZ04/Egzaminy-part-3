<!DOCTYPE html>

<?php

use function PHPSTORM_META\sql_injection_subst;

$dbConn = new mysqli('localhost', 'root', '', 'prognoza');

?>

<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prognoza pogody Wrocław</title>
    <link rel="stylesheet" href="styl2.css">
</head>

<body>

    <header>

        <section id="header_left">

            <img src="./logo.png" alt="meteo">

        </section>

        <section id="header_center">

            <h1>Prognoza dla Wrocławia</h1>

        </section>

        <section id="header_right">

            <p>maj, 2019 r.</p>

        </section>

    </header>

    <main>

    <table>

        <tr>
            <th>DATA</th>
            <th>TEMPERATURA W NOCY</th>
            <th>TEMPERATURA W DZIEŃ</th>
            <th>OPADY [mm/h]</th>
            <th>CIŚNIENIE [mPh]</th>
        </tr>

        <!-- script1 -->

        <?php

            $sql = "SELECT * FROM `pogoda` WHERE `miasta_id` = 1 ORDER BY `data_prognozy`;";
            $sql_resault = $dbConn->query($sql);

            while($data = mysqli_fetch_array($sql_resault, MYSQLI_BOTH)){

                $date = $data['data_prognozy'];
                $night_temp = $data['temperatura_noc'];
                $day_temp = $data['temperatura_dzien'];
                $downfall = $data['opady'];
                $pressure = $data['cisnienie'];

                echo <<<TX

                    <tr>
                    
                    <td>$date</td>
                    <td>$night_temp</td>
                    <td>$day_temp</td>
                    <td>$downfall</td>
                    <td>$pressure</td>
                    
                    </tr>
            
                TX;

            }

        ?>


    </table>

    </main>

    <section>

        <div id="sec_left">

            <img src="./obraz.jpg" alt="Polska, Wrocław">

        </div>

        <div id="sec_right">

            <a href="../kwerendy.txt">Pobierz kwerendy</a>

        </div>

    </section>

    <footer>

        <a href="Stronę wykonał: 00000000000"></a>

    </footer>

</body>

</html>

<?php $dbConn ->close() ?>