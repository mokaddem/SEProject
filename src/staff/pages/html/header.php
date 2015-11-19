<?php session_start();
	if (!array_key_exists("ID", $_SESSION)) {
		header("location: login.php?error=reject");
		exit();
	}
?>
    <meta charset="utf-8">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><i class="fa fa-home"></i> Staff Mode - Charles de Lorraine</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <?php echo $_SESSION["NAME"]; ?>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="../pages/staff.php">
                            <div>
                                <i class="fa fa-user"></i> Profil 
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-cog"></i> Préférences
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" href="login.php?action=logout">
                        <i class="fa fa-sign-out fa-fw"></i>
                </a>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse colorDarkBlue">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="index.php"><i class="fa fa-home fa-fw"></i> Accueil</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Listes<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level colorBlue">
                            <li>
                                <a href="list.php?type=player"> Participants</a>
                            </li>
                            <li>
                                <a href="list-team.php"> Equipes</a>
                            </li>
                            <li>
                                <a href="list-match.php"> Matchs</a>
                            </li>
                            <li>
                                <a href="list.php?type=court"> Terrains</a>
                            </li>
                            <li>
                                <a href="list.php?type=owner"> Propriétaires</a>
                            </li>
                            <li>
                                <a href="list.php?type=category"> Catégories</a>
                            </li>
                            <li>
                                <a href="list-extras.php"> Extras</a>
                            </li>
                            <li>
                                <a href="list.php?type=staff"> Staff</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-plus fa-fw"></i> Ajouter<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level colorBlue">
                            <li>
                                <a href="player.php"> Paire</a>
                            </li>
                            <li>
                                <a href="team.php"> Equipe</a>
                            </li>
                            <li>
                                <a href="match.php"> Match</a>
                            </li>
                            <li>
                                <a href="court.php"> Terrain</a>
                            </li>
                            <li>
                                <a href="owner.php"> Propriétaire</a>
                            </li>
                            <li>
                                <a href="category.php"> Catégorie</a>
                            </li>
                            <li>
                                <a href="extra.php"> Extra</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href=""><i class="fa fa-sitemap fa-fw"></i> Tournoi</a>
                    </li>
                    <li>
                                <a href="#">Poules<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level colorBlue">
                                    <li>
                                        <a href="group-generate.php">Génération</a>
                                    </li>
                                    <li>
                                        <a href="group.php?jour=sam&poule=1">Modification</a>
                                    </li>
                                    <li>
                                        <?php
                                        include_once('./php/BDD.php');
                                        $db = BDconnect();

                                        $grpSattmp = $db->query('SELECT * FROM GroupSaturday');
                                        $grpSuntmp = $db->query('SELECT * FROM GroupSunday');

                                        if (!empty($grpSattmp)) {
                                            $row=$grpSattmp->fetch_array();
                                            $PouleID = $row['ID'];
                                            $TeamID = $row['ID_t1'];
                                            $url = "input-group-score.php?poule=".$PouleID."&team=".$TeamID?>
                                            <a href=<?=$url?>>Saisir un score</a>
                                        <?php }else{ ?>
                                            <a href="input-group-score.php">Saisir un score</a>
                                        <?php }
                                        ?>

                                    </li>
                                    <li>
                                        <a href="group-overview.php?jour=sam">Vue d'ensemble</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Knock-Off<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level colorBlue">
                                    <li>
                                        <a href="knock-off-generate.php">Création</a>
                                    </li>
                                    <li>
                                        <a href="knock-off.php?jour=sam&cat=1">Modification</a>
                                    </li>
                                    <li>
                                        <a href="input-knock-score.php?jour=sam">Saisir score</a>
                                    </li>
                                    <li>
                                        <a href="knock-off-results.php?jour=sam">Résultats</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="li-danger">
                                <a href="reset.php">Réinitialiser</a>
                            </li>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-comments-o"></i> Communication<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level colorBlue">
                            <li>
                                <a href="contact.php"> Envoyer un mail</a>
                            </li>
                            <li>
                                <a href="adresse.php"> Récupérer les adresses</a>
                            </li>
                            <li>
                                <a href="email.php"> Récupérer les e-mails</a>
                            </li>
                            <!--<li>
                                    <a href="login.php">Login Page</a>
                                </li>-->
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="../../index.php?action=logout"><i class="fa fa-home fa-fw"></i> Retour au site</a>
                    </li>

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>