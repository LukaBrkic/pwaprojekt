<?php
    include 'php/connect.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PWA</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    
        <div class="topnav" id="myTopnav">
        <h1 id="mainNaslov">
             BBC 
        </h1> 
            <a href="">Home</a>
            <a href="php/kategorija.php?category=kultura">Kultura</a>
            <a href="php/kategorija.php?category=sport">Sport</a>
            <a href="php/administracija.php">Administracija</a>
            <a href="unos.html">Unos</a>
            <a href="registracija.php">Registracija</a>
        </div>

    <section class="sekcija welcome">
        <h1 class="welcomeMessage">Welcome to BBC.com</h1>
        <h3 id="date">Thursday, 16th May</h5>
    </section>
    <section class="sekcija">
        <h1 class="naslov">Sport</h1>
        <?php
        $query = "SELECT * FROM articles WHERE arhiva=0 AND category='sport'  ORDER BY id DESC LIMIT 3";
        $result = mysqli_query($dbc, $query);
        while($row = mysqli_fetch_array($result))
        {
            $slikicaPath = "uploadaneSlike/" . $row['slikica'];
            echo '<article class="artikl">';
            echo '<a href="php/clanak.php?id='.$row['id'].'">';
            echo '<img class="articleImage"  src=' . $slikicaPath . ">";
            echo '<h1>' . $row['title'] . '</h1>';
            echo '<p class="maxWidth">' . $row['about'] . "</p>";
            echo '</a>';
            echo '</article>';
        }
            
        ?>
    </section>
    <section class="sekcija padded">
        <h1 class="naslov">Kultura</h1>
        <?php
            $query = "SELECT * FROM articles WHERE arhiva=0 AND category='kultura'  ORDER BY id DESC LIMIT 3";
            $result = mysqli_query($dbc, $query);
            while($row = mysqli_fetch_array($result))
            {
                $slikicaPath = "uploadaneSlike/" . $row['slikica'];
                echo '<article class="artikl">';
                echo '<a href="php/clanak.php?id='.$row['id'].'">';
                echo '<img class="articleImage" src=' . $slikicaPath . ">";
                echo '<h1>' . $row['title'] . '</h1>';
                echo $row['about'];
                echo '</a>';
                echo '</article>';
            }
        ?>
    </section>
    <footer>
        <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved.</p>
    </footer>
</body>

</html>