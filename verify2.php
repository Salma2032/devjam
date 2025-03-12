<?php
session_start();
$otpError="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valider OTP
    if (!isset($_POST['otp'])||!isset($_SESSION['otp'])) {echo'error';}
        $entered_otp = $_POST['otp'];
        $stored_otp = $_SESSION['otp'];
    if ($entered_otp  == $stored_otp) {
        header("Location: newpass.php");
    } else {
        $otpError = "Code OTP incorrecte !";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" >
    <title>Verification du mail</title>
    <link rel="icon" type="image/png" href="./images/fav.png">
    <style>
        body {
            background-image: url('./images/landscape.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            justify-content: center;
            align-items: center;
        }
        .container {
            vertical-align: middle;
            background-color: #fff;
            justify-content: center;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            border-radius: 10px;
                
            display: table-cell;    
             
        }
        .btn-primary {
            background-color: #000080;
            border-color: #000080;
            width:250px;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center" >
        <form method="POST" class="form-group">
            <h2>Vérifiez votre mail</h2>
            <div class="mb-3">
                <label for="otp">Entrez l'OTP:</label>
                <input type="text" name='otp' id='otp' class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Envoyer</button>
            <p class="text-danger"><?php echo $otpError; ?></p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9Si7Iz2V+89pT6tAbW8MWzwhQm6dFfsE9AE4mO7R5D4/6aL6Dz6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-4uOfzD7CV+o2z3IAt1Zx98xU/DRh76REjv4RTx+zW9F9U6BxFwtTTgVeNm1J5iKw" crossorigin="anonymous"></script>
</body>
</html>
