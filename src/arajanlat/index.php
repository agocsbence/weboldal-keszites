<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weboldal készítés - HAROM.studio</title>

    <link rel="stylesheet" href="//unpkg.com/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
        $name = $_POST["f_name"];
        $email = $_POST["f_email"];
        $website = $_POST["f_website"];
        $range = $_POST["f_range"];
        $message = $_POST["f_message"];
        $to = "bence@harom.studio, " . $email;
        $subject = "Érdeklődés";
        $subject2 = "Érdeklődés rögzítése - HAROM.studio";
        $encoding = "utf-8";

        $mail_message = "
        <html>
        <head>
          <title>Érdeklődés - ". $name ."</title>
        </head>
        <body>
          <h2>Név: ". $name ."</h2>
          <h2>Email: ". $email ."</h2>
          <h2>Weboldal: <a href='". $website ."'>". $website ."</a></h2>
          <h2>Keret: ". $range .".000 Ft</h2>
          <p>Megjegyzés: ". $message ."</p>
        </body>
        </html>
        ";

        $mail_message2 = "
        <html>
        <head>
          <title>Érdeklődés rögzítve - ". $name ." - HAROM.studio</title>
        </head>
        <body>
          <h2>Kedves ". $name ."!</h2>
          <h3>Árajánlat kérésed rögzítettük az alábbi adatokkal:</h3>
          <p>Email cím: ". $email ."</p>
          <p>Weboldal cím: <a href='" . $website ."'>". $website ."</a></p>
          <p>Keret: ". $range .".000 Ft</p>
          <p>Megjegyzés: ". $message ."</p>
          <br>
          <p>Köszönjük a megkeresést, hamarosan jelentkezünk!</p>
          <br>
          <p>Üdvözlettel,</p>
          <p>a HAROM.studio csapata</p>
        </body>
        </html>
        ";

        // Preferences for Subject field
        $subject_preferences = array(
            "input-charset" => $encoding,
            "output-charset" => $encoding,
            "line-break-chars" => "\r\n"
        );
        // Mail header
        $header = "Content-type: text/html; charset=".$encoding." \r\n";
        $header .= "From: ".$name." <".$email."> \r\n";
        $header .= "MIME-Version: 1.0 \r\n";
        $header .= "Content-Transfer-Encoding: 8bit \r\n";
        $header .= "Date: ".date("r (T)")." \r\n";
        $header .= iconv_mime_encode("Subject", $subject, $subject_preferences);

        // Send mail
        mail($to, $subject, $mail_message, $header);
        mail($email, $subject2, $mail_message2, $header2);
        // if (){
        //     echo "sikeres <br>";
        //     echo $mail_message;
        // } else {
        //     echo "sikertelen <br>";
        // };
    ?>
    <header class="border-bottom container">
        <div id="logo">
            <img src="../img/harom-logo-dark.svg" alt="HAROM.studio">
        </div>
        <nav>
            <ul>
                <li><a href="../index.html#services">szolgáltatások</a></li>
                <li><a href="../index.html#process">folyamat</a></li>
                <li><a href="../index.html#about">rólunk</a></li>
                <li><a href="../index.html#contact">kapcsolat</a></li>
                <li class="btn"><a href="#">árak</a></li>
            </ul>
        </nav>
    </header>
    <main>

        <section id="form" class="border-top container">
            <h2>árajánlat kérés</h2>
            <div class="flexbox">
                <form action="" method="POST">
                    <label for="f_name">
                        név
                        <input type="text" name="f_name" required aria-required="true" maxlength="100">
                    </label>
                    <label for="f_email">
                        email cím
                        <input type="email" name="f_email" required pattern="^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$" spellcheck="false" required aria-required="true" title="pl. email@cim.hu; tartalmaznia kell a @ karaktert és a domain címet is (pl. cim.hu)">
                    </label>
                    <label for="f_website">
                        weboldal cím (ha van)
                        <input type="text" name="f_website" maxlength="100">
                    </label>
                    <label for="f_range">
                        keret (igény szerint)
                        <input type="range" min="10" max="990" value="10" step="10" id="f_range" name="f_range">
                        <p><span id="rangeValue"></span>.000 Ft</p>
                    </label>
                    <label for="f_message">
                        megjegyzés
                        <textarea name="f_message" id="f_message" cols="30" rows="10"></textarea>
                    </label>
                    <input type="submit" value="küldés" class="btn">
                </form>
                <div id="bomb-wrapper">
                    <img src="../img/bomb.png" alt="HAROM.studio">
                </div>
            </div>
        </section>
        
        <section id="contact" class="border-top container">
            <h2>kapcsolat</h2>
            <div class="grid">
                <div class="grid-item">
                    <a href="" class="email-link grid-item">weboldal@harom.studio</a>
                </div>
                <!-- <div class="grid-item desktop-only"></div> -->
                <div class="grid-item">
                    <a href="" class="insta-link grid-item">instagram</a>
                </div>
                <div class="grid-item">
                    <a href="" class="fb-link grid-item">facebook</a>
                </div>
                <div class="grid-item">
                    <a href="" class="web-link grid-item">harom.studio</a>
                </div>
                <div class="grid-item">
                    <a href="" class="btn button-link grid-item">árajánlat</a>
                </div>
            </div>
        </section>
    </main>
    <footer>
        cookie consent
    </footer>
    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
    <script>
        var rangeValue = document.getElementById('f_range'),
            output = document.getElementById('rangeValue');
        output.innerHTML = rangeValue.value;
        rangeValue.oninput = function() {
            output.innerHTML = this.value;
        }
    </script>
</body>
</html>