<!DOCTYPE html>

<?php

$dbConn = new mysqli('localhost', 'root', '', 'egzamin');

//script1

var_dump($_POST);

if (isset($_POST['weight']) && isset($_POST['height'])) {

    $weight = $_POST['weight'];
    $height = $_POST['height'];

    settype($weight, 'int');
    settype($height, 'int');

    if ($weight != 0 && $height != 0) {
        $BMI = $weight / pow($height, 2) * 10000;
        $today = date("Y-m-d");


        if ($BMI == 0) {
            $wynik = 1;
        } elseif ($BMI > 0 && $BMI <= 19) {
            $wynik = 2;
        } elseif ($BMI > 19 && $BMI <= 26) {
            $wynik = 3;
        } else {
            $wynik = 4;
        }

        $sql1 = "INSERT INTO `wynik`(`id`, `bmi_id`, `data_pomiaru`, `wynik`) VALUES ('','$wynik','$today','$BMI');";
        $dbConn->query($sql1);
        header("Location: waga.php");
    }
}

?>

<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twój wskaźnik BMI</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>

    <header>

        <section id="header_left">

            <h2>Oblicz wskaźnik BMI</h2>

        </section>

        <section id="logo">

            <img src="./wzor.png" alt="liczymi BMI">

        </section>

    </header>

    <section id='second'>

        <div id="sec_left">

            <img src="./rys1.png" alt="zrzuć kalorie!">

        </div>

        <div id="sec_right">

            <h1>Podaj dane</h1>
            <form action="waga.php" method="post">

                <label for="weight">Waga: </label>
                <input type="number" name="weight" id="weight">
                <br>

                <label for="height">Wzrost: </label>
                <input type="number" name="height" id="height">

                <input type="submit" value="Licz BMI i zapisz wynik">

            </form>

            <?php

            global $BMI;
            global $weight;
            global $height;

            if ($weight != 0 && $height != 0) {
                echo "Twoja waga: $weight; Twój wzrost: $height <br> Twoje BMI wynosi: " . $BMI;
            }


            ?>

        </div>

    </section>

    <main>

        <table>

            <tr>
                <th>lp.</th>
                <th>Interpretacja</th>
                <th>zaczyna się od...</th>

            </tr>

            <!-- script2 -->
            <?php

            $sql2 = "SELECT `id`, `informacja`, `wart_min` FROM `bmi`;";
            $sql2_resault = $dbConn->query($sql2);

            while ($data = mysqli_fetch_array($sql2_resault, MYSQLI_BOTH)) {

                $id = $data['id'];
                $info = $data['informacja'];
                $min_value = $data['wart_min'];

                echo <<<TX
                        <tr>
                        <td>$id</td>
                        <td>$info</td>
                        <td>$min_value</td>
                        </tr>
                    TX;
            }

            ?>



        </table>

    </main>

    <footer>

        Autor: 00000000000
        <a href="../screeny/kw2.jpg">Wynik działania kwerendy 2</a>

    </footer>

</body>

</html>

<?php $dbConn->close(); ?>