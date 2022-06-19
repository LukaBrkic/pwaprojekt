<?php
    $category =  $_POST['category'];
    $title = $_POST['title'];
    $autor = "AUTOR"; 
    $objavljenoDatum = "OBJAVLJENO";
    $desc = $_POST['about'];
    $articleText = $_POST['articleText'];
    $slikica = $_FILES["slikica"];
    $upFile = "../uploadaneSlike/" . date("Y_m_d_H_i_s") . $slikica["name"];
    if(is_uploaded_file($slikica["tmp_name"]))
    {
        if(!move_uploaded_file($slikica["tmp_name"], $upFile))
        {
            echo "couldn't upload image";
        }
    }
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


   <section class="artiklFull padded">
        <h1> <?php echo $category; ?>  </h1>
        <h2 class="upper"> <?php echo $title; ?>  </h2>
        <?php echo $autor; ?> <br> 
        <?php echo $objavljenoDatum; ?> <br>
        <img src="<?php echo $upFile; ?>"> <br><br>
        <?php echo $desc; ?> <br><br>
        <?php echo $articleText; ?> <br>
   </section>
    <footer>
        <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved.</p>
    </footer>
</body>

</html>

