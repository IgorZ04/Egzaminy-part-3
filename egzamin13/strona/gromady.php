<!DOCTYPE html>

<?php 

$host = 'localhost';
$user = 'root';
$passwrod = '';
$db = 'baza';

$dbConn = new mysqli($host, $user, $passwrod, $db);



?>

<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gromady kręgowców</title>
    <link rel="stylesheet" href="style12.css">
</head>

<body>


    <header>
        <section id="menu">

            <a href="./gromada-ryby.html">gromada ryb</a>
            <a href="./gromada-ptaki.html">gromada ptaków</a>
            <a href="./gromada-ssaki.html">gromada ssaków</a>

        </section>

        <section id="logo">

            <h2>GROMADY KRĘGOWCÓW</h2>

        </section>

    </header>



    <main>

        <section id="main_left">

            <!-- script1 -->

            <?php 
            
                $sql1 = "SELECT `id`, `Gromady_id`, `gatunek`, `wystepowanie` FROM `zwierzeta` WHERE `Gromady_id` = 4 OR `Gromady_id` = 5;";
                $sql1_resault = $dbConn->query($sql1);

                while($data1 = mysqli_fetch_array($sql1_resault, MYSQLI_BOTH)){

                    $id = $data1['id'];
                    $gromady = $data1['Gromady_id'];
                    $gatunek = $data1['gatunek'];
                    $wystepowanie = $data1['wystepowanie'];

                    echo "<p>$id. $gatunek</p>";

                    switch($gromady){

                        case 4:
                            echo "<p>Występowanie: $wystepowanie, gromada ptaki</p>";
                        break;

                        case 5:
                            echo "<p>Występowanie: $wystepowanie, gromada ssaki</p>";
                        break;


                    }

                    echo "<hr>";

                    


                    

                }
            
            ?>

        </section>

        <section id="main_right">

            <h1>PTAKI</h1>
            <ol>
                <!-- script2 -->
                
                <?php 
                
                $sql2 = "SELECT `gatunek`, `obraz` FROM `zwierzeta` WHERE `Gromady_id` = 4;";
                $sql2_resault = $dbConn->query($sql2);

                while($data2 = mysqli_fetch_array($sql2_resault, MYSQLI_BOTH)){

                    $gatunek = $data2['gatunek'];
                    $obraz = $data2['obraz'];

                    echo "<li><a href='$obraz'>$gatunek</a></li>";

                }

                ?>

            </ol>

            <img src="./sroka.jpg" alt="Sroka zwyczajna, gromada ptaki">

        </section>

    </main>

    <footer>

        Stronę o kręgowcach przygotował: 00000000000

    </footer>

</body>

</html>

<?php $dbConn->close()?>