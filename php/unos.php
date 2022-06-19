<?php
    include 'connect.php';
    $category =  $_POST['category'];
    $title = $_POST['title'];
    $about = $_POST['about'];
    $articleText = $_POST['articleText'];
    $slikica = date("Y_m_d_H_i_s") . $_FILES["slikica"]["name"];
    $arhiva = isset($_POST['archive']) ? true : false;
    $stmt = $dbc->prepare("INSERT INTO articles (category, title, about, articleText, slikica, arhiva) 
    VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $category, $title, $about,  $articleText, $slikica,  $arhiva);
    $stmt->execute();
    $stmt->close();
    include 'displayPodataka.php';
?>



