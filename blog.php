<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConcentrEsi-Blog</title>
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
            <a href="index.php" class="logo">
                <img src="./images/logo.png" alt="">
            </a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
            <ul>
                <li><a href="index.php">ACCEUIL</a></li>
                <li><a href="about.php">A PROPOS</a></li>
                <li><a href="course.php">APPLICATION</a></li>
                <li><a href="blog.php">BLOG</a></li>
                <li><a href="contact.php">CONTACT</a></li>
            </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <h1>Blog</h1>
    </header>   

    <!-- blog content -->

    <section class="blog-content">
        <div class="row">
            <div class="blog-left">
                <img src="./images/human.jpg" alt="">
                <h2 style="color:#000080">Notre Mode Centré Sur L'humain</h2>
                Webhelp se distingue par son approche résolument centrée sur l'humain, plaçant les relations humaines au cœur de chaque interaction. En tant que leader mondial des solutions d'externalisation des processus métier (BPO), Webhelp s'engage à offrir bien plus que des services : chaque interaction devient une opportunité d'établir des relations durables et de véritables partenariats. Grâce à une équipe dévouée et empathique, Webhelp comprend les besoins uniques de ses clients et met tout en œuvre pour dépasser leurs attentes, offrant des solutions sur mesure qui répondent non seulement aux exigences commerciales, mais aussi aux valeurs humaines profondes. <br><br>

                Elle qui distingue véritablement Webhelp, c'est sa capacité à allier technologie de pointe et humanité. En intégrant des innovations numériques de dernière génération avec une approche centrée sur les personnes, Webhelp transforme les défis complexes en opportunités de croissance partagée. Chaque employé est formé à embrasser cette philosophie, garantissant que chaque interaction est empreinte d'authenticité, d'empathie et de professionnalisme. Que ce soit pour soutenir la croissance des entreprises ou pour améliorer l'expérience client, Webhelp se positionne comme un partenaire stratégique de confiance, capable de naviguer avec succès dans un monde en constante évolution, tout en conservant un engagement indéfectible envers l'humain

                <div class="comment-box">
                    <h3 style="color:#000080">Commentez ici</h3>

                <form action="https://formspree.io/f/mjkbkelb" class="comment-form" method="post">
                        <input type="text" name="name" id="name" placeholder="Entrez votre nom">
                        <input type="email" name="email" id="email" placeholder="Entrez votre mail">
                        <textarea rows="5" name="comment" placeholder="votre commentaire ....."></textarea>
                        <button type="submit" class="hero-btn red-btn">POSTER</button>
                    </form>       
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
