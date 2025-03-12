<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/src/Exception.php';
require './phpmailer/src/phpmailer.php';
require './phpmailer/src/SMTP.php';
require './phpmailer/vendor/autoload.php';


$servername = "localhost";
$username = "root";
$password = "Nouhailalachgar@2004";
$dbname = "concentresi";

$pass=$email=$cpass=$user="";
$emailError=$passError=$cpassError=$userError="";

// connexion de base donnée
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connexion echouée: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isvalid=true;
//username
   if (empty($_POST["username"])) {
        $userError = "Nom d'utilisateur est vide";
        $isValid = false;
    }else{
       $user=$_POST['username']; 
    }
//email
    if (empty($_POST["email"])) {
        $emailError = "mail est vide";
        $isvalid = false;
    } else {
        $email = $_POST["email"];
        if (!preg_match('/^[a-zA-Z]+[.][a-zA-Z]+@esi\.ac\.ma$/', $email)) {
            $emailError = "Entrez votre mail d'<b>ESI</b>";
            $isvalid = false;
        } else {
            $sql = "SELECT * FROM register WHERE email='$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $emailError = "mail déjà utilisé.";
                $isvalid = false;
            }
        }
    }
//password
    if (empty($_POST['password'])) {
        $passError = "Mot de passe vide";
        $isvalid = false;
    } else {
        $pass=$_POST['password'];
        if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $pass)) {
            $passError = "Mot de passe insuffisant! Il doit inclure des majuscules, minuscules, caractères spéciaux, et au moins 8 caractères.";
            $isvalid = false;
        }   
        
    if (empty($_POST['confirm_password'])) {
                $cpassError = "Confirmation du mot de passe vide";
                $isvalid = false;
            } else {
                $cpass=$_POST['confirm_password'];
                if ($pass !== $_POST['confirm_password'] ) {
                    $cpassError = "Les deux mots de passe ne sont pas identiques!";
                    $isvalid = false;

            }
        }
    }
    
    if($isvalid==true){
                // Générer OTP
                $otp = rand(100000, 999999);
                $_SESSION['otp'] = $otp;
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $user; 
                $_SESSION['password'] = $pass; 

                // envoi du mail
                $mail = new PHPMailer(true);
                try {
                    $mail->SMTPDebug = 0;
                    $mail->SMTPSecure = "tls";  
                    $mail->Host='smtp.gmail.com';  
                    $mail->Port='587';   
                    $mail->Username   = 'nouhaila.lachgar.04@gmail.com'; 
                    $mail->Password   = 'naxc aqdf qfbb jvld'; 
                    $mail->SMTPKeepAlive = true;  
                    $mail->Mailer = "smtp"; 
                    $mail->IsSMTP();  
                    $mail->SMTPAuth   = true;   
                    $mail->CharSet = 'utf-8';  
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                        )
                        ); 

        
                    // Recipients
                    $mail->setFrom('nouhaila.lachgar.04@gmail.com', 'ConcentrEsi');
                    $mail->addAddress($email, $user);
        
                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Verification du Mail';
                    $mail->Body    = "Bonjour $user,<br><br> Votre: code de vérification est : <b>$otp</b><br><br> Merci de s'inscrire.";
                    $mail->AltBody = "Bonjour $user,\n\nVotre code de vérification : $otp\n\nMerci de s'inscrire.";
        
                    $mail->send();

                    header("Location: verify.php");
                    exit;
                } catch (Exception $e) {
                    echo "un problème d'OTP: {$mail->ErrorInfo}";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>ConcentrEsi-Register</title>
    <link rel="icon" type="image/png" href="./images/fav.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            border-radius: 10px;
        }
        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            width:275px;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #000091;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #000080;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        span{
            
            right: 15px;
            transform: translate(0, -50%);
            top: 50%;
            cursor: pointer;
        }
        .fa{
            font-size: 20px;
            color: #000080;
        }
        
    </style>
</head>
<body style="background-image: url(./images/landscape.jpg);background-position: center;">
    <div class="container">
        <h2>Inscription</h2>
        <form id="registerForm" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="POST">
            <input type="text" name="username" placeholder="Nom d'utilisateur"  value=<?php echo htmlspecialchars($user); ?>>
            <p class="error"><?php echo "$userError ";?></p>

            <input type="text" name="email" placeholder="Mail d'ESI"  value=<?php echo htmlspecialchars($email); ?>>
            <p class="error"><?php echo "$emailError ";?></p>

            <input type="password" id="password" name="password" placeholder="Mot de passe"  value=<?php echo htmlspecialchars($pass); ?>>
            <p class="error"><?php echo "$passError ";?></p>

            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmez le mot de passe"  value=<?php echo htmlspecialchars($cpass); ?>>
            <p class="error"><?php echo "$cpassError ";?></p>
            <span>
                <i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
            </span><br><br>

            <div id="password_error" class="error"></div>
            <input type="checkbox" required><i style="color:#000080">NB: Ce mail sera le même utilisé après pour remplir le formulaire</i>
            <p>vous avez déjà un compte <u><a href="login.php">Connexion</a></p></u>
            <button type="submit">s'inscrire</button>
        </form>
    </div>
    <script>
        var state= false;
        function toggle() {
            if(state) {
                document.getElementById("password").setAttribute("type","password");
                document.getElementById("confirm_password").setAttribute("type","password");
                state = false;
                document.getElementById("eye").style.color='#000080';
        }else{
                document.getElementById("password").setAttribute("type","text");
                document.getElementById("confirm_password").setAttribute("type","text");
                state = true;
                document.getElementById("eye").style.color='cyan';
        }
    }
    </script>
</body>
</html>
