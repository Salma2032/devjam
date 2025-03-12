<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConcentrEsi-About</title>
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
            <a href="">
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
        <h1>A Propos</h1>
    </header>   
        <section class="about-us">
            <h1 style="color:#000080" class="schema">A propos du programme ConcentrEsi</h1>
            <h4 class="schema"><br>      Le programme Concentresi, né de la collaboration entre l'entreprise Concentrix et l'École des Sciences de l'Information (ESI), est conçu pour offrir à chaque étudiant un traitement direct et rapide de leurs CVs, en leur proposant des stages en adéquation avec leurs filières d'études. Grâce à cette initiative innovante, les étudiants de l'ESI bénéficient d'un accès privilégié à une plateforme dédiée où leurs CVs sont minutieusement analysés et mis en correspondance avec des opportunités de stage pertinentes. Concentrix, fort de son expertise en solutions professionnelles, joue un rôle clé en facilitant cette correspondance grâce à des algorithmes avancés et une connaissance approfondie des besoins du marché du travail. Ainsi, les étudiants peuvent non seulement trouver des stages adaptés à leurs compétences et aspirations académiques, mais aussi bénéficier de l'expérience et du réseau professionnel de Concentrix. Cette collaboration stratégique vise à renforcer l'insertion professionnelle des étudiants, en leur offrant des stages de qualité qui leur permettent de développer leurs compétences pratiques et d'accéder à des opportunités de carrière prometteuses.</h4>
            <h1 class="schema" style="color:#000080" >La Schématisation Du Programme</h1>
            <h4 class="schema"><br>      Tout ce que vous devez savoir concernant ce programme ,les compétences que vous allez acquérir et conformément à votre année et filière tout en garantissant des outils pratiques et un mentorat qui rend votre stage un projet fascinant. <br>     Choisissez votre filière et l'année scolaire pour découvrir les différentes compétences à appliquer dans le stage <br><i style="color:#000080">Remarque: Pour les étudiants de la première année , il auront aussi une opportunité d'explorer le plan du travail et son déroulement pour se familiariser avant de commencer le technique.</i></h4>
            <div class="row">
                <div class="about-left">
                    <div class="about-col">  
                            <div class="container-content ">
                        <div class="faq-item1" id="iin">
                            <input type="checkbox" id="question66">
                            <label for="question66">Ingénierie de l'Information Numérique (IIN)</label>
                            <div class="answer">
                              <p>
                                <div class="faq-item">
                                <input type="checkbox" id="question1" class="q1">
                                <label for="question1">1 ère année</label>
                                <div class="answer">
                                    <ul>
                                        <li>Front End (HTML,CSS,JS) & Backend(PHP,SQL)</li>
                                        <li>ECM(ERP,CMS,GED...) & E-Services</li>
                                        <li>Knowledge Management(Base de connaissance ...)</li>
                                    </ul>
                                </div>
                              </div>
                              <div class="faq-item">
                                <input type="checkbox" id="question2" class="q2">
                                <label for="question2">2 ère année</label>
                                <div class="answer">
                                    <ul>
                                        <li>Administration Bases de Données</li>
                                        <li>Fondements des Systèmes Intelligents</li>
                                        <li>Ingénierie documentaire</li>
                                        <li>Auto Indexation Document</li>
                                        <li>Gouvernance SI</li>
                                        <li>Gestion Contenus Multimédias</li>
                                    </ul>
                                </div>
                              </div>
                              <div class="faq-item">
                                <input type="checkbox" id="question3" class="q3">
                                <label for="question3">3 ère année</label>
                                <div class="answer">
                                    <ul>
                                        <li>Business Intelligence</li>
                                        <li>Technologies des données massives</li>
                                        <li>Qualité et Audit des SI</li>
                                        <li>Data & Information Governance</li>
                                        <li>Analyse et Extraction des Connaissances</li>
                                    </ul>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="faq-item1" id="isitd">
                            <input type="checkbox" id="question67">
                            <label for="question67">Ingénierie des Systèmes d'Information et Transformation Digitale (ISITD)</label>
                            <div class="answer">
                              <p>
                                <div class="faq-item">
                                <input type="checkbox" id="question4" class="q4">
                                <label for="question4">1 ère année</label>
                                <div class="answer">
                                <ul>
                                    <li>Front End (HTML,CSS,JS) & Backend(PHP,SQL)</li>
                                    <li>ECM(ERP,CMS,GED...) & E-Services</li>
                                    <li>Knowledge Management(Base de connaissance ...)</li>
                                </ul>
                                </div>
                              </div>
                              <div class="faq-item">
                                <input type="checkbox" id="question5" class="q5">
                                <label for="question5">2 ère année</label>
                                <div class="answer">
                                    <ul>
                                        <li>Administration Bases de Données</li>
                                        <li>Developpement Logiciel</li>
                                        <li>Developpement Web et Mobile</li>
                                        <li>Fondements Sciences des connaissances</li>
                                        <li>Gouvernance SI</li>
                                    </ul>
                                </div>
                              </div>
                              <div class="faq-item">
                                <input type="checkbox" id="question6" class="q6">
                                <label for="question6">3 ère année</label>
                                <div class="answer">
                                    <ul>
                                        <li>Business Intelligence</li>
                                        <li>Technologies des données massives</li>
                                        <li>Qualité et Audit des SI</li>
                                        <li>TD et Technologies Avancées</li>
                                        <li>Intégration des SI</li>
                                    </ul>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="faq-item1" id="iscd">
                            <input type="checkbox" id="question68">
                            <label for="question68">Ingénierie des Connaissances et Sciences de Données(ICSD)</label>
                            <div class="answer">
                              <p>
                                <div class="faq-item">
                                    <input type="checkbox" id="question7" class="q7">
                                    <label for="question7">1 ère année</label>
                                    <div class="answer">
                                    <ul>
                                        <li>Front End (HTML,CSS,JS) & Backend(PHP,SQL)</li>
                                        <li>ECM(ERP,CMS,GED...) & E-Services</li>
                                        <li>Knowledge Management(Base de connaissance ...)</li>
                                        <li>Bases du Data Analysis avec Python(Pandas,Numpy...)</li>
                                    </ul>
                                    </div>
                                  </div>
                              <div class="faq-item">
                                <input type="checkbox" id="question8" class="q8">
                                <label for="question8">2 ère année</label>
                                <div class="answer">
                                    <ul>
                                        <li>Administration Bases de Données</li>
                                        <li>Programmation Orienté Objet</li>
                                        <li>Cryptocurrency Technologies</li>
                                        <li>Fondements systèmes Intelligents</li>
                                        <li>Recherche Opérationnelle Avancée</li>
                                        <li>Data Analysis & Acquisition</li>
                                    </ul>
                                </div>
                              </div>
                              <div class="faq-item">
                                <input type="checkbox" id="question9" class="q9">
                                <label for="question9">3 ère année</label>
                                <div class="answer">
                                    <ul>
                                        <li>Business Intelligence</li>
                                        <li>Text & Graph Recognition</li>
                                        <li>Computer Vision & Pattern Récognition</li>
                                        <li>Gestion des Risques & Innovation</li>
                                        <li>Data Architecture</li>
                                    </ul>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="faq-item1" id="issic">
                            <input type="checkbox" id="question69">
                            <label for="question69">Ingénierie de la Sécurité des Systèmes d’Information et Cyberdéfense(ISSIC)</label>
                            <div class="answer">
                              <p>
                                <div class="faq-item">
                                <input type="checkbox" id="question10" class="q10">
                                <label for="question10">1 ère année</label>
                                <div class="answer">
                                    <ul>
                                        <li>Front End (HTML,CSS,JS) & Backend(PHP,SQL)</li>
                                        <li>ECM(ERP,CMS,GED...) & E-Services</li>
                                        <li>Knowledge Management(Base de connaissance ...)</li>
                                        <li>Bases du Data Analysis avec Python(Pandas,Numpy...)</li>
                                    </ul>
                                </div>
                              </div>
                              <div class="faq-item">
                                <input type="checkbox" id="question11" class="q11">
                                <label for="question11">2 ère année</label>
                                <div class="answer">
                                    <ul>
                                        <li>Fondements Cybersécurité</li>
                                        <li>Programmation Orienté Objet</li>
                                        <li>Administration Réseau et Qos</li>
                                        <li>Théorie l'information et traitment signal</li>
                                        <li>Machine Learning</li>
                                        <li>Cryptographie</li>
                                    </ul>
                                </div>
                              </div>
                              <div class="faq-item">
                                <input type="checkbox" id="question12" class="q12">
                                <label for="question12">3 ère année</label>
                                <div class="answer">
                                    <ul>
                                        <li>Ethical Hacking</li>
                                        <li>Sécurité Réseau et Mobile</li>
                                        <li>Biometric system & security</li>
                                        <li>Gouvernance et audit sécurité des SI</li>
                                    </ul>
                                </div>
                              </div>
                            </div>
                        </div>
                
                            </div>
                    </div>
                </div>
                <div class="about-right "><img src="./images/intern.jpg"></div>
            </div>
        </section>


    <!-- footer -->
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





    <script src=".//js/app.js"></script>
</body>
</html>
