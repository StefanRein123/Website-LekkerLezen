<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <p><br><br><br><br></p>
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
        
        $ID = $_GET["ID"];
        $sql = "SELECT * FROM boeken WHERE ID = $ID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
        
            echo "Titel: " . $row["Titel"] . '<br>';
            echo "Auteur: " . $row["Auteur"] . '<br>'; 
            echo "Taal: " . $row["Taal"] . '<br>';
            echo "Uitgever: " . $row["Uitgever"] . '<br>'; 
            echo "EAN code: " . $row["EAN"] . '<br>'; 
            echo "Aantal pagina's: " . $row["AantalPaginas"] . '<br>';
            echo $row["Image"] . '<br>'; 
            echo "Oud of nieuw?: " . $row["Nieuw"] . '<br>';
            echo "Samenvatting: " . $row["Samenvatting"] . '<br>';
            echo "Prijs: " . $row["Prijs"] . '<br>';
        }
    } else {
    echo "Geen resultaten gevonden!";
    }
    $conn->close();
    ?>
</body>
</html>