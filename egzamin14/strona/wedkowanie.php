<!DOCTYPE html>

<?php 

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'wedkowanie';

$dbConn = new mysqli($host, $user, $password, $db);

if(!$dbConn) echo "DB Connection Error";

?>

<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klub wedkowania</title>
    <link rel="stylesheet" href="styl2.css">
</head>

<body>

    <header>

        <h2>Wędkuj z nami!</h2>

    </header>

    <main>

        <section id="main_left">

            <img src="./ryba2.jpg" alt="Szczupak">

        </section>

        <section id="main_right">

            <h3>Ryby spokojnego żeru(białe)</h3>

            <!-- script -->

            <?php 
            
                $sql1 = "SELECT `id`, `nazwa`, `wystepowanie` FROM `ryby` WHERE `styl_zycia` = 2;";
                $sql1_resault = $dbConn->query($sql1);

                while($data1 = mysqli_fetch_array($sql1_resault,MYSQLI_BOTH)){

                    $id = $data1['id'];
                    $name = $data1['nazwa'];
                    $distribution = $data1['wystepowanie'];

                    echo <<<TX

                        $id. $name, występuje w: $distribution <br>

                    TX;

                }
            
            ?>

            <ol>
                <li><a href="https://wedkuje.pl/" target="_blank">Odwiedź także</a></li>
                <li><a href="https://www.pzw.org.pl/" target="_blank" Związek Wędkarski>Polski Związek Wędkarski</a></li>
            </ol>

        </section>

    </main>

    <footer>

        <p>Stronę wykonał: 00000000000</p>

    </footer>



</body>

</html>

<?php $dbConn->close()?>