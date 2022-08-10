<?php
require_once './vendor/autoload.php';

$helperLoader = new SplClassLoader('Helpers', './vendor');
$mailLoader   = new SplClassLoader('SimpleMail', './vendor');

$helperLoader->register();
$mailLoader->register();

use Helpers\Config;
use SimpleMail\SimpleMail;

$config = new Config;
$config->load('./config/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = stripslashes(trim($_POST['form-name']));
    $email   = stripslashes(trim($_POST['form-email']));
    $phone   = stripslashes(trim($_POST['form-phone']));
    $subject = stripslashes(trim($_POST['form-subject']));
    $message = stripslashes(trim($_POST['form-message']));
    $pattern = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';

    if (preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $subject)) {
        die("Header injection detected");
    }

    $emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($name && $email && $emailIsValid && $subject && $message) {
        $mail = new SimpleMail();

        $mail->setTo($config->get('emails.to'));
        $mail->setFrom($config->get('emails.from'));
        $mail->setSender($name);
        $mail->setSenderEmail($email);
        $mail->setSubject($config->get('subject.prefix') . ' ' . $subject);

        $body = "
        <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
        <html>
            <head>
                <meta charset=\"utf-8\">
            </head>
            <body>
                <h1>{$subject}</h1>
                <p><strong>{$config->get('fields.name')}:</strong> {$name}</p>
                <p><strong>{$config->get('fields.email')}:</strong> {$email}</p>
                <p><strong>{$config->get('fields.phone')}:</strong> {$phone}</p>
                <p><strong>{$config->get('fields.message')}:</strong> {$message}</p>
            </body>
        </html>";

        $mail->setHtml($body);
        $mail->send();

        $emailSent = true;
    } else {
        $hasError = true;
    }
}


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <link href="main.css" rel="stylesheet" type="text/css">






    <title>Contact Us - Pryor Management</title>
</head>

<body>

    <nav class="navbar navbar-expand-md">



        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
           
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="navbar-nav">
              
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>


                <div class="dropdown">

                    <a class="nav-item nav-link dropdown-toggle"  id="artistsDropdown"
                        aria-haspopup="true" aria-expanded="false" href="artist.html">Artists</a>

                    <div class="dropdown-menu" aria-labelledby="artistsDropdown">
                        <a class="dropdown-item" href="Cadams.html">Corey Adams</a>
                        <a class="dropdown-item" href="Kbeals.html">Keonté Beals</a>
                        <a class="dropdown-item" href="Htooth.html">Hogtooth</a>
                        <a class="dropdown-item" href="Msymonds.html">Marcell Symonds</a>
                        <a class="dropdown-item" href="Sslide.html">Stick & Slide</a>
                    </div>
                </div>








                <li class="nav-item">
                    <a class="nav-link" href="events.html">Events</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="banner">
        <div id="p1">
            Pryor Management
        </div>

        <div id="p2">
            Entertainment Management, Artist Booking & Concert Promotion
        </div>

    </div>

    <div class="overlay"></div>

    <div class="container features">

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">

                <p class="pageText">
                    To contact us please enter your information in the boxes provided and we'll contact you as soon as
                    possible.

                </p>
            </div>
            <div class="col-lg-4 col-lg-7 col-sm-12">

                

                    <div id="wufoo-zfz0g3z0bsiict" > <a href="https://webcontactform.wufoo.com/forms/zfz0g3z0bsiict">
                        </a>  </div>
                    <script
                        type="text/javascript"> var zfz0g3z0bsiict; (function (d, t) { var s = d.createElement(t), options = { 'userName': 'webcontactform', 'formHash': 'zfz0g3z0bsiict', 'autoResize': true, 'height': '423', 'async': true, 'host': 'wufoo.com', 'header': 'show', 'ssl': true }; s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'secure.wufoo.com/scripts/embed/form.js'; s.onload = s.onreadystatechange = function () { var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return; try { zfz0g3z0bsiict = new WufooForm(); zfz0g3z0bsiict.initialize(options); zfz0g3z0bsiict.display(); } catch (e) { } }; var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr); })(document, 'script'); </script>

                

            </div>

        </div>

    </div>


    <footer>

        <div class="footer-copyright text-center">Copyright © 2020 Pryor Management</div>

    </footer>


    <script src="js/jquery.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>

</html>