<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "Nouhailalachgar@2004";
$dbname = "concentresi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$pass_err=$mail_err="";
$email=$password="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email=$_POST['email'];       

    $sql = "SELECT * FROM register WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($_POST['password'], $row['password'])) {
                $password = $_POST['password'];
                
                $_SESSION['username'] = $row['username'];
                $_SESSION['logged'] = true;
                header("Location: index.php");
            } else {
                $pass_err = "Mot de passe invalide.";
            }
        } else {
            $mail_err = "Mail inconnu.";
        }

        $stmt->close();
    } else {
        $error_message = "Erreur de préparation de la requête.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js?onload=onloadTurnstileCallback" defer></script>   
    <title>ConcentrEsi-Connexion</title>
    <link rel="icon" type="image/png" href="./images/fav.png">
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
<body style="background-image: url(./images/landscape.jpg);">
    <div class="container">
        <h2>Connexion</h2>
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="POST">
            <input class="case" type="text" name="email" placeholder="Mail d'ESI" value=<?php echo htmlspecialchars($email); ?>>
            <p class="error"><?php echo "$mail_err ";?></p>

            <input  class="case" type="password" name="password" id="password" placeholder="Mot de passe" value=<?php echo htmlspecialchars($password); ?>>
            <span>
                <i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
            </span>
            <p class="error"><?php echo "$pass_err ";?></p>

            <p>vous êtes nouveau ?<a href="register.php"> s'inscrire</a></p>
            <p>vous voulez quitter ? <a href="logout.php">Déconnexion</a></p>
            <p>Mot de passe oublié ?<a href="reset.php">Changer</a></p>
            <button type="submit">Connexion</button>
        </form>
    </div>
    <script>
        var state= false;
        function toggle() {
            if(state) {
                document.getElementById("password").setAttribute("type","password");
                state = false;
                document.getElementById("eye").style.color='#000080';
        }else{
                document.getElementById("password").setAttribute("type","text");
                state = true;
                document.getElementById("eye").style.color='cyan';
        }
    }
    </script>
</body>
</html>

