<?php session_start(); ?>

    <!doctype html>
    <html>

    <?php
        if (array_key_exists("action", $_GET)) {
            if ($_GET["action"] == "logout") {
                $_SESSION = array();
                session_unset();
                session_destroy();
            }
        }
         ?>

        <head lang="fr">
            
            <link rel="shortcut icon" href="./images/icon.ico">
            
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

            <title>Tennis Tournament</title>

            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="fancybox/jquery.fancybox-v=2.1.5.css" type="text/css" media="screen">

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="css/font-awesome.min.css" rel="stylesheet">

            <link rel="stylesheet" type="text/css" href="css/style.css">
            <link rel="stylesheet" type="text/css" href="css/alicia.css">

            <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600,300,200&subset=latin,latin-ext' rel='stylesheet' type='text/css'>


            <link rel="prefetch" href="images/zoom.png">

        </head>

        <body>
            <div class="navbar navbar-fixed-top" data-activeslide="1">
                <div class="container">

                    <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                    <div class="nav-collapse collapse navbar-responsive-collapse">
                        <ul class="nav row">
                            <li data-slide="1" class="col-12 col-sm-2"><a id="menu-link-1" href="#slide-1"><span class="icon icon-home"></span> <span class="text">ACCUEIL</span></a></li>
                            <li data-slide="2" class="col-12 col-sm-2"><a id="menu-link-2" href="#slide-2"><span class="icon icon-user"></span> <span class="text">INSCRIPTION</span></a></li>
                            <li data-slide="3" class="col-12 col-sm-2"><a id="menu-link-3" href="#slide-3"><span class="icon icon-picture"></span> <span class="text">PHOTOS</span></a></li>
                            <li data-slide="4" class="col-12 col-sm-2"><a id="menu-link-4" href="#slide-4"><span class="icon icon-map-marker"></span> <span class="text">NOUS TROUVER</span></a></li>
                            <!-- <li data-slide="5" class="col-12 col-sm-2"><a id="menu-link-5" href="#slide-5" title="Next Section"><span class="icon icon-heart"></span> <span class="text">PARTENAIRES</span></a></li> -->
                            <li data-slide="6" class="col-12 col-sm-2"><a id="menu-link-6" href="#slide-6"><span class="icon icon-envelope"></span> <span class="text">NOUS CONTACTER</span></a></li>
                            <ul class="nav pull-right">
                                <li class="col-12 col-sm-2"><a href='./staff/pages/login.php' onclick="self.location.href='./staff/pages/login.php'"><span class='icon-wrench' style='font-size: 10pt;'></span> <span class="text">ADMIN</span></a></li>
                            </ul>
                        </ul>

                        <div class="row">
                            <div class="col-sm-2 active-menu"></div>
                        </div>
                    </div>
                    <!-- /.nav-collapse -->

                </div>
                <!-- /.container -->
            </div>
            <!-- /.navbar -->


            <!-- === Arrows === -->
            <div id="arrows">
                <div id="arrow-up" class="disabled"></div>
                <div id="arrow-down"></div>
                <div id="arrow-left" class="disabled visible-lg"></div>
                <div id="arrow-right" class="disabled visible-lg"></div>
            </div>
            <!-- /.arrows -->

            <?php
            if (array_key_exists("action", $_GET) && $_GET["action"] == "register") { ?>

                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Inscription réussite</h4>
                            </div>
                            <div class="modal-body">
                                <p>Félicitation !</p>
                                <p>Vous avez bien été enregistré !</p>
                                <p>Vous recevrez un e-mail de confirmation sous peu</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                <?php
            }

            ?>

            <!-- === MAIN Background === -->
            <div class="slide story" id="slide-1" data-slide="1">
                <div class="container">
                    <div id="home-row-1" class="row clearfix">
                        <div class="col-12">
                            <h1 class="font-semibold">Charles de Lorraine</h1>
                            <h4 class="font-thin"><span class="font-semibold">Le Tournoi</span> à ne pas rater.</h4>
                            <br>
                            <br>
                        </div>
                        <!-- /col-12 -->
                    </div>
                    <!-- /row -->
                    <div id="home-row-2" class="row clearfix">
                        <div class="col-12 col-sm-4">
                            <div class="home-hover navigation-slide" data-slide="2"><img src="images/s02.png"></div><span>INSCRIPTION</span></div>
                        <div class="col-12 col-sm-4">
                            <div class="home-hover navigation-slide" data-slide="4"><img src="images/s01.png"></div><span>NOUS TROUVER</span></div>
                        <div class="col-12 col-sm-4">
                            <div class="home-hover navigation-slide" data-slide="6"><img src="images/s03.png"></div><span>NOUS CONTACTER</span></div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /slide1 -->

            <!-- === Slide 2 === -->
            <div class="slide story" id="slide-2" data-slide="2">
                <div class="container">
                    <div class="row title-row">
                        <div class="col-12 font-thin"><span class="font-semibold">Bienvenue</span> sur le site du <span class="font-semibold">Charles de Lorraine</span></div>
                    </div>
                    <!-- /row -->
                    <div class="row line-row">
                        <div class="hr">&nbsp;</div>
                    </div>
                    <!-- /row -->
                    <div class="row subtitle-row">
                        <div class="col-12 font-thin">Préparez-vous à <span class="font-semibold">chauffer les raquettes</span>.</div>
                    </div>
                    <!-- /row -->
                    <div class="row content-row">
                        <div class="col-12 col-lg-6">
                            <h4>Tout simplement incontournable ! Le tournoi Charles de Lorraine est un passage obligatoire pour les amateurs de la raquette. Chaque année, cet évènement invite les passionnés à vivre une expérience riche en épreuves et en émotions. </h4>
                            <h4>Inscrivez-vous en équipe dès maintenant pour être certain de passer un moment inoubliable.</h4>
                        </div>
                        <!-- /col12 -->

                        <div class="col-12 col-lg-3 col-sm-6">
                            <a class="btn btn-lg btn-default" href="./inscription/index.php" onclick="self.location.href='./inscription/index.php'">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                    <i id="crayon" class="fa fa-pencil fa-stack-1x"></i>
                                </span>
                            </a>
                            <h2 class="font-semibold">Inscription<br/>Participant</h2>
                        </div>
                        <!-- /col12 -->
                        <div class="col-12 col-lg-3 col-sm-6">
                            <a class="btn btn-lg btn-default" href="./inscription/inscription-owner.php" onclick="self.location.href='./inscription/inscription-owner.php'">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                    <i id="crayon" class="fa fa-suitcase fa-stack-1x"></i>
                                </span>
                            </a>
                            <h2 class="font-semibold">Inscription<br/>Propriétaire</h2>
                        </div>

                        <!-- /col12 -->
                    </div>
                    <!-- /row -->

                </div>
                <!-- /container -->
            </div>
            <!-- /slide2 -->

            <!-- === SLide 3 - Portfolio -->
            <div class="slide story" id="slide-3" data-slide="3">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-2">  
                        <a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p8.jpg"><img class="thumb" src="images/portfolio/p8-s.jpg" alt=""></a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-2">
                        <a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p2.jpg"><img class="thumb" src="images/portfolio/p2-s.jpg" alt=""></a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-2">
                        <a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p3.jpg"><img class="thumb" src="images/portfolio/p3-s.jpg" alt=""></a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-2">
                        <a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p5.jpg"><img class="thumb" src="images/portfolio/p5-s.jpg" alt=""></a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-2">
                        <a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p4.jpg"><img class="thumb" src="images/portfolio/p4-s.jpg" alt=""></a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-2">
                        <a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p6.jpg"><img class="thumb" src="images/portfolio/p6-s.jpg" alt=""></a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-2">
                        <a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p7.jpg"><img class="thumb" src="images/portfolio/p7-s.jpg" alt=""></a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-2">
                        <a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p1.jpg"><img class="thumb" src="images/portfolio/p1-s.jpg" alt=""></a>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /slide3 -->

            <!-- === Slide 4 - Process === -->
            <div class="slide story" id="slide-4" data-slide="4">
                <div class="container">
                    <div class="row title-row">
                        <div class="col-12 font-thin"><span class="font-semibold">Venez</span> nous voir</div>
                    </div>
                    <!-- /row -->
                    <div class="row line-row">
                        <div class="hr">&nbsp;</div>
                    </div>
                    <!-- /row -->
                    <div class="row subtitle-row">
                        <div class="col-sm-1 hidden-sm">&nbsp;</div>
                        <div class="col-12 col-sm-10 font-light">Nous serons ravis de vous accueillir sur l'ensemble de nos terrains.</div>
                        <div class="col-sm-1 hidden-sm">&nbsp;</div>
                    </div>
                    <!-- /row -->
                    <div class="row row-content">
                        <div class="col-sm-1 hidden-sm">&nbsp;</div>
                        <img src="images/maps.png" class="img-responsive" data-toggle="modal" data-target="#myMap"/>
                        <div id="myMap" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <iframe class="col-xs-10 col-xs-offset-1" width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10114.823419260181!2d4.6149338!3d50.6697217!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfa60a1ea8f163970!2sUniversit%C3%A9+catholique+de+Louvain!5e0!3m2!1sfr!2sbe!4v1444218871953"></iframe>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-1 hidden-sm">&nbsp;</div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /slide4 -->

            <!-- === Slide 5 === -->
            <!-- <div class="slide story" id="slide-5" data-slide="5">
		<div class="container">
			<div class="row title-row">
				<div class="col-12 font-thin"><span class="font-semibold">Partenaires</span> we’ve worked with</div>
			</div> -->
            <!-- /row -->
            <!-- <div class="row line-row">
				<div class="hr">&nbsp;</div>
			</div> -->
            <!-- /row -->
            <!-- <div class="row subtitle-row">
				<div class="col-sm-1 hidden-sm">&nbsp;</div>
				<div class="col-12 col-sm-10 font-light">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. <br/><br/> The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero.</div>
				<div class="col-sm-1 hidden-sm">&nbsp;</div>
			</div> -->
            <!-- /row -->
            <!-- <div class="row content-row">
				<div class="col-1 col-sm-1 hidden-sm">&nbsp;</div>
				<div class="col-12 col-sm-2"><img src="images/client01.png" alt=""></div>
				<div class="col-12 col-sm-2"><img src="images/client02.png" alt=""></div>
				<div class="col-12 col-sm-2"><img src="images/client03.png" alt=""></div>
				<div class="col-12 col-sm-2"><img src="images/client04.png" alt=""></div>
				<div class="col-12 col-sm-2"><img src="images/client05.png" alt=""></div>
				<div class="col-1 col-sm-1 hidden-sm">&nbsp;</div>
			</div> -->
            <!-- /row -->
            <!-- </div> -->
            <!-- /container -->
            <!-- </div> -->
            <!-- /slide5 -->

            <!-- === Slide 6 / Contact === -->
            <div class="slide story" id="slide-6" data-slide="6">
                <div class="container">
                    <div class="row title-row">
                        <div class="col-12 font-light">Laissez-nous un <span class="font-semibold">message</span></div>
                    </div>
                    <!-- /row -->
                    <div class="row line-row">
                        <div class="hr">&nbsp;</div>
                    </div>
                    <!-- /row -->
                    <div class="row subtitle-row">
                        <div class="col-sm-1 hidden-sm">&nbsp;</div>
                        <div class="col-12 col-sm-10 font-light">N'hésitez pas à nous faire part de vos réactions, il n'y a qu'un bouton à appuyer.</div>
                        <div class="col-sm-1 hidden-sm">&nbsp;</div>
                    </div>
                    <!-- /row -->


                </div>
                <!-- /container -->
            </div>
            <!-- /Slide 6 -->

            <!-- Contact Section -->
            <section id="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <form name="sentMessage" id="contactForm" novalidate>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Votre Nom *" id="name" required data-validation-required-message="Please enter your name.">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Votre Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" class="form-control" placeholder="Votre Téléphone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Votre Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12 text-center">
                                        <div id="success"></div>
                                        <button type="submit" class="btn btn-xl">Evoyer Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SCRIPTS -->
            <!--<script src="js/jquery.js"></script>-->
            <script src="js/html5shiv.js"></script>
            <script src="js/jquery-1.10.2.min.js"></script>
            <script src="js/jquery-migrate-1.2.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/jquery.easing.1.3.js"></script>
            <script type="text/javascript" src="fancybox/jquery.fancybox.pack-v=2.1.5.js"></script>
            <script src="js/script.js"></script>
            <script src="js/contact_me.js"></script>
            <script src="js/jqBootstrapValidation.js"></script>

            <!-- fancybox init -->
            <script>
                $(document).ready(function (e) {
                    var lis = $('.nav > li');
                    menu_focus(lis[0], 1);

                    $(".fancybox").fancybox({
                        padding: 10,
                        helpers: {
                            overlay: {
                                locked: false
                            }
                        }
                    });

                });
            </script>
            <script type="text/javascript">
                <!--
                $('#myModal').modal('show');
                //-->
            </script>
        </body>

    </html>
