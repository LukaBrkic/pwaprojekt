<?php
include 'php/connect.php';
$registriranKorisnik =false;
$msg = "";
if(isset($_POST['ime']))
{
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $username = $_POST['korisnicko_ime'];
    $lozinka = $_POST['password'];
    $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
    $razina = 0;
    $stmt = $dbc->prepare("SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($found);
    $stmt->fetch();
    if($found){
        $msg = 'Korisničko ime već postoji!';
    } else {
        $stmt->close();
        $stmt = $dbc->prepare( "INSERT INTO korisnik (ime, prezime,korisnicko_ime, lozinka,razina)
        VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $ime, $prezime, $username, $hashed_password, $razina);
        $stmt->execute();
        $registriranKorisnik = true;
        $msg = "Uspješna registracija!";
    }
    mysqli_close($dbc);
}

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

            var imeLen = document.getElementById("ime").value.length;
            if (imeLen == 0) {
                posaljiFormu = false;
                document.getElementById("ime").style.borderColor = "red";
                document.getElementById("imePoruka").innerHTML = "Ime ne smije biti prazno! <br> ";
            } else {
                document.getElementById("ime").style.borderColor = "black";
                document.getElementById("imePoruka").innerHTML = "";
            }
            var prezimeLen = document.getElementById("prezime").value.length;
            if (prezimeLen == 0) {
                posaljiFormu = false;
                document.getElementById("prezime").style.borderColor = "red";
                document.getElementById("prezimePoruka").innerHTML = "Prezime ne smije biti prazno! <br> ";
            } else {
                document.getElementById("prezime").style.borderColor = "black";
                document.getElementById("prezimePoruka").innerHTML = "";
            }
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
            if (passwordLen < 5) {
                posaljiFormu = false;
                document.getElementById("password").style.borderColor = "red";
                document.getElementById("passwordPoruka").innerHTML = "Sifra ne smije biti kraca od 5 slova! <br> ";
            } else {
                document.getElementById("password").style.borderColor = "black";
                document.getElementById("passwordPoruka").innerHTML = "";
            }
            var password = document.getElementById("password").value;
            var pPassword = document.getElementById("pSifra").value;
            if (password !== pPassword) {
                posaljiFormu = false;
                document.getElementById("pSifra").style.borderColor = "red";
                document.getElementById("pSifraPoruka").innerHTML = "Sifre moraju biti iste! <br> ";
            } else {
                document.getElementById("pSifra").style.borderColor = "black";
                document.getElementById("pSifraPoruka").innerHTML = "";
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
        <a href="index.php">Home</a>
        <a href="php/kategorija.php?category=kultura">Kultura</a>
        <a href="php/kategorija.php?category=sport">Sport</a>
        <a href="php/administracija.php">Administracija</a>
        <a href="unos.html">Unos</a>
        <a href="">Registracija</a>

    </div>
    <form enctype="multipart/form-data" onsubmit="return validacijaForme()" method="post" action="">
        <div class="container">
            <div class="row">
                <div class="col-25">
                    <label for="ime">Ime:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="ime" name="ime">
                    <span class="red" id="imePoruka"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="prezime">Prezime:</label><br>
                </div>
                <div class="col-75">
                    <input type="text" id="prezime" name="prezime">
                    <span class="red" id="prezimePoruka"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="korisnicko_ime">Korisnicko ime:</label><br>
                </div>
                <div class="col-75">
                    <input type="text" id="korisnicko_ime" name="korisnicko_ime">
                    <span class="red" id="korisnicko_imePoruka"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="sifra">Šifra:</label><br>
                </div>
                <div class="col-75">
                    <input type="password" class="formatiranje" id="password" name="password">
                    <span class="red" id="passwordPoruka"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="pSifra">Ponovljena šifra:</label><br>
                </div>
                <div class="col-75">
                    <input type="password" class="formatiranje" id="pSifra">
                    <span class="red" id="pSifraPoruka"></span>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <input type="submit" value="Submit">
            </div>
            <div class="row">
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