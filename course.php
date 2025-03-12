<?php
include 'session.php';
?>

<?php
$servername = "localhost";
$username = "root";
$password = "Nouhailalachgar@2004";
$dbname = "concentresi";

$isValid=true;
$cin=$nom=$prenom=$email=$type=$niveau=$filiere=$target_file="";
$cinErr=$nomErr=$prenomErr=$emailErr=$typeErr=$niveauErr=$filiereErr=$cvErr=$success=$already=$already2="";

//connexion 
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // nom
    if (empty($_POST["nom"])) {
        $nomErr = "Nom est vide";
        $isValid = false;
    } else {
        $nom = $_POST["nom"];
    }

    // prenom
    if (empty($_POST["prenom"])) {
        $prenomErr = "Prénom est vide";
        $isValid = false;
    } else {
        $prenom = $_POST["prenom"];
    }

    //cv
        if (isset($_FILES["cv"]) && $_FILES["cv"]["error"] == UPLOAD_ERR_OK) {
        $target_dir = "./uploads/";
        $original_filename = basename($_FILES["cv"]["name"]);
        $fileType = strtolower(pathinfo($original_filename, PATHINFO_EXTENSION));
        
        
        if ($fileType != "doc" && $fileType != "pdf") {
            $cvErr = "Pardon, seuls les fichiers PDF ou DOC sont autorisés.";
            $isValid = false;
        } else {
            $new_filename = strtolower($prenom . "_" . $nom . "." . $fileType);
            
            $target_file = $target_dir . $new_filename;
            $counter = 1;
            while (file_exists($target_file)) {
                $new_filename = strtolower($prenom . "_" . $nom . "_" . $counter . "." . $fileType);
                $target_file = $target_dir . $new_filename;
                $counter++;
            }
            
            if (!move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file)) {
                $cvErr = "Erreur lors du téléchargement du fichier.";
                $isValid = false;
            }
        }
    } else {
        if (isset($_FILES["cv"]["error"]) && $_FILES["cv"]["error"] != UPLOAD_ERR_OK) {
            $cvErr = "Erreur de téléchargement: " . $_FILES["cv"]["error"];
        } else {
            $cvErr = "Le champ CV est vide.";
        }
        $isValid = false;
    }

    // niveau
    if (empty($_POST["niveau"])) {
        $niveauErr = "Niveau est vide";
        $isValid = false;
    } else {
        $niveau = $_POST["niveau"];
    }

    // filiere
    if (empty($_POST["filiere"])) {
        $filiereErr = "Filière est vide";
        $isValid = false;
    } else {
        $filiere = $_POST["filiere"];
    }

    // type
    if (empty($_POST["type"])) {
        $typeErr = "Type de stage est vide";
        $isValid = false;
    } else {
        $type = $_POST["type"];
    }

    // cin
    if (empty($_POST["cin"])) {
        $cinErr = "CIN est vide";
        $isValid = false;
    } elseif (!preg_match('/^[a-zA-Z]+[0-9]+$/', $_POST["cin"])) {
        $cinErr = "Forme incorrecte du CIN";
        $isValid = false;
    } else {
        $cin = $_POST["cin"];
        
        $stmt = $conn->prepare("SELECT * FROM form WHERE cin = ?");
        $stmt->bind_param("s", $cin);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $already = "Déjà saisi ! ";
            $isValid = false;
        }
        $stmt->close();
    }

    //mail
    if (empty($_POST["email"])) {
        $emailErr = "Mail est vide";
        $isValid = false;  
    } else {
        $email = $_POST["email"];
        if (!preg_match('/^[a-zA-Z]+[.][a-zA-Z]+@esi\.ac\.ma$/', $email)) {
            $emailErr = "Entrez votre mail d'<b>ESI</b> !";
            $isValid = false;
        }
        
        $stmt = $conn->prepare("SELECT * FROM register WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 0) {
            $emailErr = "Mail inconnu ! entrez un mail d'<b>ESI</b> avec lequel vous vous êtes inscrits ";
            $isValid = false;
        }
        $stmt->close();

        $stmt = $conn->prepare("SELECT * FROM form WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $already2 = "ce mail est déjà saisi ! ";
            $isValid = false;
        }
        $stmt->close();
    }

    //insertion dans la base de donnée
    if ($isValid) {
        $stmt = $conn->prepare("INSERT INTO form(cin, nom, prenom, niveau, filiere, type, cv, commentaire, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $cin, $nom, $prenom, $niveau, $filiere, $type, $target_file, $_POST["comment"], $email);
        if ($stmt->execute()) {
            $success = "🎉Succès ! Votre formulaire a été soumis avec succès ";
        } else {
            $success = "Erreur lors de la soumission du formulaire.";
        }
        $stmt->close();
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConcentrEsi-Application</title>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css" integrity="sha512-72McA95q/YhjwmWFMGe8RI3aZIMCTJWPBbV8iQY3jy1z9+bi6+jHnERuNrDPo/WGYEzzNs4WdHNyyEr/yXJ9pA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="./css/main.css">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="./images/fav.png">
</head>
<body> 
    <!--   header section   -->
    <header class="sub-header">
        <nav>
        <a href="index.php">
                <img src="./images/logo.png" alt="">
            </a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="../index.php">ACCEUIL</a></li>
                    <li><a href="../about.php">A PROPOS</a></li>
                    <li><a href="../course.php">APPLICATION</a></li>
                    <li><a href="../blog.php">BLOG</a></li>
                    <li><a href="../contact.php">CONTACT</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <h1>Application</h1>
    </header>   

    <!-- blog content -->

    <section class="blog-content">
        <div class="row">
            <div class="blog-left">
                <h2>📌Comment Postuler ?</h2>

<h3>✔ Entrée des informations personnelles</h3><br>
Remplissez le formulaire ci-dessous en entrant vos informations personnelles, telles que votre nom, prénom, adresse e-mail, et toute autre donnée requise. Assurez-vous que toutes les informations fournies sont exactes et à jour.

<h3>✔ Téléversement du CV, lettre de motivation et CIN</h3><br>
Préparez votre CV , rédigez une lettre de motivation personnalisée , et mettez les deux dans le même fichier en format PDF et téléversez-le dans la case correspondante dans le formulaire. Veillez à ce que votre CV soit à jour et reflète vos compétences et expériences les plus pertinentes.

<h3>✔ Soumission de la candidature</h3><br>
Une fois toutes les informations et documents téléversés, soumettez votre candidature en cliquant sur le bouton de validation du formulaire. Votre dossier sera alors automatiquement pris en compte et traité par l'équipe ConcentrEsi, qui analysera vos documents et effectuera le rapprochement avec les opportunités de stage les plus pertinentes.<br><br>
<h4>Votre candidature sera traitée le plus tôt possible</h4><br>

<style>
.custom-select {
    color:#ffffff;
    background-color:#a8a8a8;
    text-align: center;
    border-color: transparent;
}
.error { color: red;font-size:15px }
.success{color:green;font-size:15px}

</style>
                <div class="comment-box">
                <p class="success"><b><?php echo "$success <br>";?></b></p>
                <p class="error"><b><?php echo "$already <br>";?></b></p>
                    <h3>Formulaire</h3>

                    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> id="form" class="comment-form" method="post" enctype="multipart/form-data">
                        <label for="cin">CIN <b style="color:red">*</b>:</label>
                        <input type="text" name="cin" id="cin" placeholder="Mettez votre CIN ..." value=<?php echo htmlspecialchars($cin); ?>>
                        <p class="error"><?php echo "$cinErr <br>";?></p>

                        <label for="nom">Nom <b style="color:red">*</b>:</label>  
                        <input type="text" name="nom" id="nom" placeholder="Mettez votre nom ..." value=<?php echo htmlspecialchars($nom); ?>>
                        <p class="error"><?php echo "$nomErr <br>";?></p>

                        <label for="prenom">Prénom <b style="color:red">*</b>:</label>
                        <input type="text" name="prenom" id="prenom" placeholder="Mettez votre prénom ..." value=<?php echo htmlspecialchars($prenom); ?>>
                        <p class="error"><?php echo "$prenomErr <br>";?></p>

                        <label for="cin">Niveau <b style="color:red">*</b>:</label><br>
                        <select class="niveau custom-select" style="width:500px; height:35px" name="niveau" >
                            <option value="0" <?php if ($niveau == "0") echo 'selected'; ?>>Choisir le niveau</option>
                            <option value="1_ère_année" <?php if ($niveau == "1_ère_année") echo 'selected'; ?>>1 ère année</option>
                            <option value="2_ème_année" <?php if ($niveau == "2_ème_année") echo 'selected'; ?>>2 ème année</option>
                            <option value="3_ème_année" <?php if ($niveau == "3_ème_année") echo 'selected'; ?>>3 ème année</option>
                        </select><br><br>
                        <p class="error"><?php echo "$niveauErr <br>";?></p>
                        

                        <label for="filiere">Filière <b style="color:red">*</b>:</label><br>
                        <select class="filiere custom-select" style="width:500px; height:35px" name="filiere">
                            <option value="0" <?php if ($filiere== "0") echo 'selected'; ?>>Choisir la filière</option>
                            <option name="filiere" value="iin" <?php if ($filiere== "iin") echo 'selected'; ?>>IIN</option>
                            <option name="filiere"value="isitd" <?php if ($filiere== "isitd") echo 'selected'; ?>>ISITD</option>
                            <option name="filiere" value="issic" <?php if ($filiere== "issic") echo 'selected'; ?>>ISSIC</option>
                            <option name="filiere"value="icsd" <?php if ($filiere== "icsd") echo 'selected'; ?>>ICSD</option>
                        </select><br><br>
                        <p class="error"><?php echo "$filiereErr <br>";?></p>

                        <label for="type">Type de stage <b style="color:red">*</b>:</label><br>
                        <select class="type custom-select" style="width:500px; height:35px" name="type">
                            <option value="0" <?php if ($type== "0") echo 'selected'; ?>>Choisir le type du stage</option>
                            <option name="type" value="observation"<?php if ($type== "observation") echo 'selected'; ?>>Observation</option>
                            <option name="type" value="pratique" <?php if ($type== "pratique") echo 'selected'; ?>>Pratique</option>
                            <option name="type" value="les deux" <?php if ($filiere== "les deux") echo 'selected'; ?>>Les deux</option>
                        </select><br><br>
                        <p class="error"><?php echo "$typeErr <br>";?></p>


                        <label for="cv">Fichier PDF du CV et Lettre de motivation <b style="color:red">*</b>:</label><br> 
                        <input type="file" name="cv" id="cv" value=<?php echo htmlspecialchars($target_file); ?>>
                        <p class="error"><?php echo "$cvErr <br>";?></p>

                        <label for="email">Mail ESI <b style="color:red">*</b>:</label><br>
                        <input type="text" name="email" id="email" placeholder="Mettez votre mail ESI ..." value=<?php echo htmlspecialchars($email); ?>>
                        <p class="error"><?php echo "$emailErr <br>";?></p>
                        <p class="error"><b><?php echo "$already2 <br>";?></b></p>

                        <label for="commentaire">Commentaire:</label><br>
                        <textarea rows="5" name="comment" id="comment" placeholder="Votre commentaire(remarque ,avis...) ..."></textarea>

                        <button type="submit" class="hero-btn red-btn ">SOUMETTRE</button>
                    </form>
                </div>     
                </div>
            </div>
        </div>
    </section>  
    <style>
        .fa-facebook{
            font-size: 30px ;
            color:#000080
        }
        .fa-linkedin{
            font-size:30px;
            color:#000080
        }
        .fa-square-instagram{
            font-size:30px;
            color:#000080
        }
        .fa-x-twitter{
           font-size:30px;
           color:#000080
        }
     </style>
    <footer class="footer">
        <h4 style="color:#000080">Social</h4>
        <p>Vérifiez Nos Réseaux Sociaux Pour Plus D'infos</p>
        <div class="icons">
            <a href="https://web.facebook.com/ConcentrixIN/?_rdc=1&_rdr"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.instagram.com/concentrixmaroc/"><i class="fa-brands fa-square-instagram"></i></a>
            <a href="https://x.com/Concentrix?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="https://www.linkedin.com/company/concentrix/"><i class="fa-brands fa-linkedin"></i></a>
            
        </div>
    </footer>



    <script src=".//js/app.js"></script>
    
</body>
</html>
