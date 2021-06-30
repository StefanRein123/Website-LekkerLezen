<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lekker Lezen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>        
        <div class="right">
            <ul>
                <li><a href="contact.html">CONTACT</a></li>
                <li><a href="webshop.php">WEBSHOP</a></li>
                <li><a href="home.php">HOME</a></li>
                <li class="left">Boekenhandel<br>Lekker Lezen</li>
            </ul>
        </div>
    </header>
    <main>
            <img class="home-pagina-boeken" src="afbeeldingen/home-pagina-boeken.jpg" alt="Boeken" width="1522" height="750">
            
            <div class="welkom">
                Welkom op de website van Boekhandel Lekker Lezen
            </div>
                <div class="welkom-kleiner">
                    <p>Zodra u uw gezochte boek niet mocht kunnen vinden op de website zijn wij in staat die voor u altijd te bestellen!<br>Bericht ons hierover naar dit nummer: 06-12345678 of e-mail ons naar: lekker.lezen@gmail.com</p>
                </div>
                    <div class="top-15">
                        <p>ONZE TOP 10 BESTSELLERS!</p>
                    </div>
    </main>
    <footer>
    <?php
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'boekhandel';

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM boeken WHERE rating > 0 ORDER BY rating";
        $result = $conn->query($sql);
        ?>
        
        <table class="center">
            
        <tr>
        <?php
        $aantalBoekenPerRegel = 5;
        $aantalBoeken = $result->num_rows;
        $generenRegels = $aantalBoeken / $aantalBoekenPerRegel;
        $nieuweRegel = true;
        $boekenTeller = 0;
        if ($result->num_rows > 0) {
        // output data of each row
        // var_dump($result);
        while($row = $result->fetch_assoc()) {
        ?>
                <?php
                    if ($boekenTeller == $aantalBoekenPerRegel or $nieuweRegel == true) {  ?>
                        <tr> 
                            
                        <?php
                         $nieuweRegel = false;
                         if ($boekenTeller == $aantalBoekenPerRegel) { 
                             $boekenTeller = 0;
                          }   
                        }

                    if ($boekenTeller <= $aantalBoekenPerRegel) {
                        ?>
                        <td>
                            <table>
                            <tr>
                                <td class="rating"><?php echo $row["Rating"] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <a href="test5.php?ID=<?php echo $row["ID"]?>"><img src=<?php echo $row["Image"] ?> alt="" width="175px" height="250px"></a>  

                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $row["Titel"] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $row["Prijs"] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><button type="button">IN WINKELMAND</button>
                                </td>
                            </tr>
                            </table>
                        </td>
                    <?php
                    $boekenTeller = $boekenTeller+1;
                    }
                ?>
        <?php
        }
        } else {
        echo "Geen resultaten gevonden!";
        }
        $conn->close();
    ?>
        </tr>
    </table>
    </form>
    </footer>
</body>
</html>
