<?php
    include 'connect.php';
    $id = $_GET['id'];
    $query = 'SELECT * FROM articles WHERE id=' . $id;
    $result = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($result);
    $category =  $row['category'];
    $title = $row['title'];
    $articleText = $row['articleText'];
    $slikica = "../uploadaneSlike/" . $row["slikica"];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PWA</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <div class="main">

        <div class="topnav" id="myTopnav">
        <h1 id="mainNaslov">
            BBC
        </h1>
        <a href="../index.php">Home</a>
        <a href="kategorija.php?category=kultura">Kultura</a>
        <a href="kategorija.php?category=sport">Sport</a>
        <a href="administracija.php">Administracija</a>
        <a href="../unos.html">Unos</a>
        <a href="../registracija.php">Registracija</a>
    </div>

        <section class="fullSekcija">
            <?php
            echo '<h1 class="naslovFull">' . $category . '</h1>';
            echo '<article class="artiklFull">';
            echo '<h1>' . $title . '</h1>';
            echo "<img src=".$slikica . ">";
            echo "<br>";
            echo $articleText;    
            echo '</article>';
            ?>
        </section>
    </div>
    <footer>
        <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved.</p>
    </footer>
</body>

</html>