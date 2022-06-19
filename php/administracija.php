<?php
session_start();
include 'connect.php';
$admin = false;
$uspjesnaPrijava = false;
$korisnickoIme = "";
$msg = "";

if(isset($_SESSION['$kIme']) && $_SESSION['$level'] == 1)
{
    echo '
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
            <a href="">Administracija</a>
            <a href="../unos.html">Unos</a>
            <a href="../registracija.php">Registracija</a>
    
    
    
        </div>
    
            <section class="fullSekcija">';
            $query = "SELECT * FROM articles ORDER BY arhiva ASC, category DESC, id DESC";
            $result = mysqli_query($dbc, $query);
            while ($row = mysqli_fetch_array($result)) {
                $slikica = "../uploadaneSlike/" . $row['slikica'];
                echo '
                    <form enctype="multipart/form-data" action="" method="POST" id="administracijaForm">
                    <div class="row">
                        <div class="col-25">
                            <label for="title">Naslov vjesti:</label> <br>
                        </div>
                        <div class="col-75">
                            <input type="text" name="title"  value="' .
                    $row['title'] .
                    '">
                            <br> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="about">Kratki sadržaj vijesti:</label>
                        </div>
                        <br>
                        <div class="col-75">
                            <textarea name="about" id="" cols="30" rows="10" >' .
                    $row['about'] .
                    '</textarea> 
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="content">Sadržaj vijesti:</label>
                            <br> 
                        </div>
                        <div class="col-75">
                            <textarea name="articleText" id="" cols="30" rows="10" >' .
                    $row['articleText'] .
                    '</textarea> 
                            <br>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-25">
                    <label for="pphoto">Slika:</label>¸
                    </div>
    
                    <br>
                    <div class="col-75">
                    <input type="file" value="' .
                    $slikica .
                    '" name="slikica" /> <br> <br> 
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                    Trenutna slika:
                    </div>
                    <div class="col-75">
                    <br><img src="' .
                    $slikica .
                    '" width=100px>
                    </div>
                    </div>
    
                    <br>
                    <div class="row">
                    <div class="col-25">
                    <label for="category">Kategorija vijesti:</label>
                    </div>
                    <div class="col-75">
    
                    <select name="category" id=""  value="' .
                    $row['category'] .
                    '">
                        <option value="sport">Sport</option>
                        <option value="kultura">Kultura</option>
                    </select>
                    </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                    <div class="col-25">
                    <label>Spremiti u arhivu: </div>
                    ';
                echo '<div class="col-75">';
                if ($row['arhiva'] == 0) {
                    echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?';
                } else {
                    echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?';
                }
    
                echo ' </label> 
                     </div>
                     </div>
                    <input type="hidden" name="id"  value="' .
                    $row['id'] .
                    '">
                    <div class="row">
                    <div class="col-25">
                    Odabir opcije:
                    </div>
                    <div class="col-75">
                    <button type="reset" value="Poništi">Poništi</button> 
                    <button type="submit" name="update" value="update"> Izmjeni</button> 
                    <button type="submit" name="delete" value="delete"> Izbriši</button>
                    </div>
                    </div>
                    </form>
                    <br> <br>  <br>  <br>  <br> 
                  
                    ';
            }
    
            if (isset($_POST['delete'])) {
                $idForDeletion = $_POST['id'];
                $query = "DELETE FROM articles WHERE id=$idForDeletion";
                $result = mysqli_query($dbc, $query);
            } else if (isset($_POST['update'])) {
                $idForUpdate = $_POST['id'];
                $category = $_POST['category'];
                $title = $_POST['title'];
                $about = $_POST['about'];
                $articleText = $_POST['articleText'];
                $slikica = date("Y_m_d_H_i_s") . $_FILES["slikica"]["name"];
                $path = "../uploadaneSlike/" . $slikica;
                move_uploaded_file($_FILES["slikica"]["tmp_name"], $path);
                $arhiva = isset($_POST['archive']) ? true : false;
                $stmt = $dbc->prepare("UPDATE articles SET 
                category = ?,
                title = ?,
                about = ?,
                articleText = ?,
                slikica = ?,
                arhiva = ?
                WHERE id=$idForUpdate");
                $stmt->bind_param("sssssi", $category, $title, $about, $articleText, $slikica, $arhiva);
                $stmt->execute();
                $stmt->close();
            }
            echo '
            </section>
        </div>
        <footer>
            <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved.</p>
        </footer>
    </body>
    
    </html>
    ';
}
if (isset($_POST['prijava'])) {

    $kIme = $_POST['korisnicko_ime'];
    $stmt = $dbc->prepare("SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?");
    $stmt->bind_param("s", $kIme);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        if (password_verify($_POST['password'], $data['lozinka'])) {
            $uspjesnaPrijava = true;
            if ($data['razina'] == 1) {
                $admin = true;
            } else {
                $admin = false;
            }
            $_SESSION['$kIme'] = $kIme;
            $_SESSION['$level'] = $data['razina'];
        } else {
            $uspjesnaPrijava = false;
        }
    } else {
        $uspjesnaPrijava = false;
    }


    if (($uspjesnaPrijava == true && $admin == true) || (isset($_SESSION['$kIme']) && $_SESSION['$level'] == 1)) {
        echo '
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
        <a href="">Administracija</a>
        <a href="../unos.html">Unos</a>
        <a href="../registracija.php">Registracija</a>



    </div>

        <section class="fullSekcija">';
        $query = "SELECT * FROM articles ORDER BY arhiva ASC, category DESC, id DESC";
        $result = mysqli_query($dbc, $query);
        while ($row = mysqli_fetch_array($result)) {
            $slikica = "../uploadaneSlike/" . $row['slikica'];
            echo '
                <form enctype="multipart/form-data" action="" method="POST" id="administracijaForm">
                <div class="row">
                    <div class="col-25">
                        <label for="title">Naslov vjesti:</label> <br>
                    </div>
                    <div class="col-75">
                        <input type="text" name="title"  value="' .
                $row['title'] .
                '">
                        <br> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="about">Kratki sadržaj vijesti:</label>
                    </div>
                    <br>
                    <div class="col-75">
                        <textarea name="about" id="" cols="30" rows="10" >' .
                $row['about'] .
                '</textarea> 
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="content">Sadržaj vijesti:</label>
                        <br> 
                    </div>
                    <div class="col-75">
                        <textarea name="articleText" id="" cols="30" rows="10" >' .
                $row['articleText'] .
                '</textarea> 
                        <br>
                    </div>
                </div>
                <div class="row">
                <div class="col-25">
                <label for="pphoto">Slika:</label>¸
                </div>

                <br>
                <div class="col-75">
                <input type="file" value="' .
                $slikica .
                '" name="slikica" /> <br> <br> 
                </div>
                </div>
                <div class="row">
                    <div class="col-25">
                Trenutna slika:
                </div>
                <div class="col-75">
                <br><img src="' .
                $slikica .
                '" width=100px>
                </div>
                </div>

                <br>
                <div class="row">
                <div class="col-25">
                <label for="category">Kategorija vijesti:</label>
                </div>
                <div class="col-75">

                <select name="category" id=""  value="' .
                $row['category'] .
                '">
                    <option value="sport">Sport</option>
                    <option value="kultura">Kultura</option>
                </select>
                </div>
                </div>
                <br>
                <br>
                <div class="row">
                <div class="col-25">
                <label>Spremiti u arhivu: </div>
                ';
            echo '<div class="col-75">';
            if ($row['arhiva'] == 0) {
                echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?';
            } else {
                echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?';
            }

            echo ' </label> 
                 </div>
                 </div>
                <input type="hidden" name="id"  value="' .
                $row['id'] .
                '">
                <div class="row">
                <div class="col-25">
                Odabir opcije:
                </div>
                <div class="col-75">
                <button type="reset" value="Poništi">Poništi</button> 
                <button type="submit" name="update" value="update"> Izmjeni</button> 
                <button type="submit" name="delete" value="delete"> Izbriši</button>
                </div>
                </div>
                </form>
                <br> <br>  <br>  <br>  <br> 
              
                ';
        }

        if (isset($_POST['delete'])) {
            $idForDeletion = $_POST['id'];
            $query = "DELETE FROM articles WHERE id=$idForDeletion";
            $result = mysqli_query($dbc, $query);
        } else if (isset($_POST['update'])) {
            $idForUpdate = $_POST['id'];
            $category = $_POST['category'];
            $title = $_POST['title'];
            $about = $_POST['about'];
            $articleText = $_POST['articleText'];
            $slikica = date("Y_m_d_H_i_s") . $_FILES["slikica"]["name"];
            $path = "../uploadaneSlike/" . $slikica;
            move_uploaded_file($_FILES["slikica"]["tmp_name"], $path);
            $arhiva = isset($_POST['archive']) ? true : false;
            $stmt = $dbc->prepare("UPDATE articles SET 
            category = ?,
            title = ?,
            about = ?,
            articleText = ?,
            slikica = ?,
            arhiva = ?
            WHERE id=$idForUpdate");
            $stmt->bind_param("sssssi", $category, $title, $about, $articleText, $slikica, $arhiva);
            $stmt->execute();
            $stmt->close();
        }
        echo '
        </section>
    </div>
    <footer>
        <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved.</p>
    </footer>
</body>

</html>
';

    }
    else {
        if(($uspjesnaPrijava == true && $admin == false) || (isset($_SESSION['$kIme']) && $_SESSION['$level'] == 0))
            $msg = $_SESSION['$kIme'] . ' nemate korisnicka prava za pristupanje ovoj stranici';
        else 
            $msg = "Neuspjesna prijava";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PWA</title>
    <link rel="stylesheet" href="../css/style.css" />
    <script type="text/javascript">
        function validacijaForme() {
            var posaljiFormu = true;
            var kImeLen = document.getElementById("korisnicko_ime").value.length;
            if (kImeLen == 0) {
                posaljiFormu = false;
                document.getElementById("korisnicko_ime").style.borderColor = "red";
                document.getElementById("korisnicko_imePoruka").innerHTML = "Korisnicko ime ne smije biti prazno! <br> ";
            } else {
                document.getElementById("korisnicko_ime").style.borderColor = "black";
                document.getElementById("korisnicko_imePoruka").innerHTML = "";
            }
            var passwordLen = document.getElementById("password").value.length;
            if (passwordLen == 0) {
                posaljiFormu = false;
                document.getElementById("password").style.borderColor = "red";
                document.getElementById("passwordPoruka").innerHTML = "Sifra ne smije biti prazna! <br> ";
            } else {
                document.getElementById("password").style.borderColor = "black";
                document.getElementById("passwordPoruka").innerHTML = "";
            }
            return posaljiFormu;
        }
    </script>
</head>

<body style="background-color:#f2f2f2">
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
    <form enctype="multipart/form-data" onsubmit="return validacijaForme()" method="post" action="">
        <div class="container">
            <div class="row">
                <div class="col-25">
                    <label for="korisnicko_ime">Korisnicko ime:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="korisnicko_ime" name="korisnicko_ime">
                    <span class="red" id="korisnicko_imePoruka"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="password">Sifra:</label><br>
                </div>
                <div class="col-75">
                    <input type="password" class="formatiranje" id="password" name="password">
                    <span class="red" id="passwordPoruka"></span>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <input type="submit" value="Submit" name="prijava">
                <?php 
                echo '<span>' . $msg . '</span>';
                ?>
            </div>
        </div>
    </form>
    <footer>
        <p class=" copyright-text">Copyright &copy; 2017 All Rights Reserved.</p>
    </footer>
</body>

</html>
<?php
    }
}
else {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PWA</title>
    <link rel="stylesheet" href="../css/style.css" />
    <script type="text/javascript">
        function validacijaForme() {
            var posaljiFormu = true;
            var kImeLen = document.getElementById("korisnicko_ime").value.length;
            if (kImeLen == 0) {
                posaljiFormu = false;
                document.getElementById("korisnicko_ime").style.borderColor = "red";
                document.getElementById("korisnicko_imePoruka").innerHTML = "Korisnicko ime ne smije biti prazno! <br> ";
            } else {
                document.getElementById("korisnicko_ime").style.borderColor = "black";
                document.getElementById("korisnicko_imePoruka").innerHTML = "";
            }
            var passwordLen = document.getElementById("password").value.length;
            if (passwordLen == 0) {
                posaljiFormu = false;
                document.getElementById("password").style.borderColor = "red";
                document.getElementById("passwordPoruka").innerHTML = "Sifra ne smije biti prazna! <br> ";
            } else {
                document.getElementById("password").style.borderColor = "black";
                document.getElementById("passwordPoruka").innerHTML = "";
            }
            return posaljiFormu;
        }
    </script>
</head>

<body style="background-color:#f2f2f2">
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
    <form enctype="multipart/form-data" onsubmit="return validacijaForme()" method="post" action="">
        <div class="container">
            <div class="row">
                <div class="col-25">
                    <label for="korisnicko_ime">Korisnicko ime:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="korisnicko_ime" name="korisnicko_ime">
                    <span class="red" id="korisnicko_imePoruka"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="password">Sifra:</label><br>
                </div>
                <div class="col-75">
                    <input type="password" class="formatiranje" id="password" name="password">
                    <span class="red" id="passwordPoruka"></span>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <input type="submit" value="Submit" name="prijava">
            </div>
        </div>
    </form>
    <footer>
        <p class=" copyright-text">Copyright &copy; 2017 All Rights Reserved.</p>
    </footer>
</body>

</html>
    <?php
} 
?>



