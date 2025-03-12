<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './phpmailer/vendor/autoload.php';

session_start();

$servername = "localhost";
$username = "root";
$password = "Nouhailalachgar@2004";
$dbname = "concentresi";

$emaile = "";
$emaileError = "";

//connexion
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emaile = $conn->real_escape_string($_POST['email']);

    if (empty($emaile)) {
        $emaileError = "Veuillez entrer un e-mail.";
    } else {
        $sql = "SELECT * FROM register WHERE email='$emaile'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            $emaileError = "Mail inconnu";
        } else {
            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['email'] = $emaile;

            $mail = new PHPMailer(true);
            try {
                $mail->SMTPDebug = 0;
                $mail->SMTPSecure = "tls";
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = '587';
                $mail->Username = 'nouhaila.lachgar.04@gmail.com';
                $mail->Password = 'naxc aqdf qfbb jvld';
                $mail->SMTPKeepAlive = true;
                $mail->Mailer = "smtp";
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->CharSet = 'utf-8';
                // Recipients
                $mail->setFrom('nouhaila.lachgar.04@gmail.com', 'ConcentrEsi');
                $mail->addAddress($emaile);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Vérification du Mail';
                $mail->Body = "Bonjour,<br><br>Pour changer votre mot de passe,$otp <br><br>";
                $mail->AltBody = "Bonjour,\n\nPour changer votre mot de passe,$otp \n\n";

                $mail->send();

                header("Location: verify2.php");
                exit;
            } catch (Exception $e) {
                echo "Un problème est survenu : {$mail->ErrorInfo}";
            }
        }
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="icon" type="image/png" href="./images/fav.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('./images/landscape.jpg');
            background-position: center;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            border-radius: 10px;
        }
        input[type="text"], input[type="password"] {
            width: 92.5%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: cyan;
            border: none;
            color: #000080;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: rgb(0, 223, 223);
        }
        .error {
            color: red;
            font-size: 0.9em;}
    </style>
    <title>ConcentrEsi - Mot de passe oublié</title>
</head>
<body>
    <div class="container">
        <p><h2>Changer le mot de passe</h2>
        <form id="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="text" name="email" placeholder="Mail d'ESI" value="<?php echo htmlspecialchars($emaile); ?>">
            <p class="error"><?php echo htmlspecialchars($emaileError); ?></p>
            <button type="submit">Confirmer</button>
        </form>
    </div>
</body>
</html>
