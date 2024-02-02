<!DOCTYPE html>

<?php 

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'ogloszenia';

$dbConn = new mysqli($host, $user, $password, $db);

?>

<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal ogłoszeniowy</title>
    <link rel="stylesheet" href="styl1.css">

</head>

<body>

    <header>

        <h1>Portal Ogłoszeniowy</h1>

    </header>

    <main>

        <section id="main_left">

            <h2>Kategorie ogłoszeń</h2>
            <ol>
                <li>Książki</li>
                <li>Muzyka</li>
                <li>Filmy</li>
            </ol>

            <img src="./ksiazki.jpg" alt="Kupię / sprzedam książkę">

            <table>

                <tr>
                    <td>Liczba ogłoszeń</td>
                    <td>Cena ogłoszenia</td>
                    <td>Bonus</td>
                </tr>

                <tr>
                    <td>1 - 10</td>
                    <td>1 PLN</td>
                    <td rowspan="3">subskrybcja newslettera to upust 0,20 PLN na ogłoszenie</td>
                </tr>
                <tr>
                    <td>11 - 50</td>
                    <td>0,80 PLN</td>
                </tr>
                <tr>
                    <td>51 i więcej</td>
                    <td>0,60 PLN</td>
                </tr>

            </table>

        </section>

        <section id="main_right">

            <h2>Ogłoszenia kategorii książki</h2>

            <!-- script -->

            <?php 
            
                $sql1 = "SELECT `id`, `tytul`, `tresc` FROM `ogloszenie` WHERE `kategoria` = 1; ";
                $sql1_resault = $dbConn -> query($sql1);

                while ($data = mysqli_fetch_array($sql1_resault, MYSQLI_BOTH)){

                    $id = $data['id'];
                    $title = $data['tytul'];
                    $content = $data['tresc'];

                    $sql2 = "SELECT `telefon` FROM `ogloszenie` JOIN `uzytkownik` WHERE `ogloszenie`.`uzytkownik_id` = `uzytkownik`.`id` AND `ogloszenie`.`id` = $id;";
                    $sql2_resault = mysqli_fetch_array($dbConn->query($sql2), MYSQLI_BOTH);

                    $phone = $sql2_resault[0];

                    echo <<<TX

                        <h3>$id $title</h3>
                        <p>$content</p>
                        <p>Telefon kotnatkowy: $phone</p>

                    TX;
                    

                }



            ?>

        </section>

    </main>

    <footer>

        <span>Portal ogłoszeniowy opracował: 00000000000</span>

    </footer>

</body>

</html>

<?php $dbConn->close() ?>