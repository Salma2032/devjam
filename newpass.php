<?php
session_start();
$pass = $cpass = "";
$passError = $cpassError = "";
$isvalid = true; 
$emaile = $_SESSION['email'];



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['password'])) {
        $passError = "Mot de passe vide";
        $isvalid = false;
    } else {
        $pass = $_POST['password'];
        if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,12}$/", $pass)) {
            $passError = "Mot de passe insuffisant! Il doit inclure des majuscules, minuscules, caractères spéciaux, et entre 8 et 12 caractères.";
            $isvalid = false;
        }
    }

    if (empty($_POST['confirm_password'])) {
        $cpassError = "Confirmation du mot de passe vide";
        $isvalid = false;
    } else {
        $cpass = $_POST['confirm_password'];
        if ($pass !== $cpass) {
            $cpassError = "Les deux mots de passe ne sont pas identiques!";
            $isvalid = false;
        }
    }

    if ($isvalid) {
        $servername = "localhost";
        $username = "root";
        $password = "Nouhailalachgar@2004";
        $dbname = "concentresi";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connexion echouée: " . $conn->connect_error);
        }
        
        $stmt = $conn->prepare("UPDATE register SET password=? WHERE email=?");
        $stmt->bind_param("ss", $pass, $emaile);

        if ($stmt->execute()) {
            header("Location: login.php");
            exit();
        } else {
            echo "Erreur de mise à jour: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConcentrEsi- Nouveau mot de passe</title>
    <link rel="icon" type="image/png" href="./images/fav.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            background-position: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            opacity: 100%;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            border-radius: 10px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            width:260px;
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
<body style="background-image: url(./images/landscape.jpg); background-position: center;">
<div class="container">
    <h2>Nouveau mot de passe</h2>
    <form id="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="password" id="password" name="password" placeholder="Mot de passe" value="<?php echo htmlspecialchars($pass); ?>">
        <p class="error"><?php echo $passError; ?></p>

        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmez le mot de passe" value="<?php echo htmlspecialchars($cpass); ?>">
        <p class="error"><?php echo $cpassError; ?></p>
        <span>
            <i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
        </span><br><br>

        <div id="password_error" class="error"></div>
        <button type="submit">Confirmer</button>
    </form>
</div>
<script>
    var state = false;
    function toggle() {
        if (state) {
            document.getElementById("password").setAttribute("type", "password");
            document.getElementById("confirm_password").setAttribute("type", "password");
            state = false;
            document.getElementById("eye").style.color = '#000080';
        } else {
            document.getElementById("password").setAttribute("type", "text");
            document.getElementById("confirm_password").setAttribute("type", "text");
            state = true;
            document.getElementById("eye").style.color = 'cyan';
        }
    }
</script>
</body>
</html>
