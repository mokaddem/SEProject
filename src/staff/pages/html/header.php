<?php session_start(); ?>

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
        <a class="navbar-brand" href="index.php"><i class="fa fa-home"></i> Admin Mode</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <li>
                    <a href="#">
                        <div>
                            <strong>Antoine Rollin</strong>
                            <span class="pull-right text-muted">
                                        <em>28/10/2015</em>
                                    </span>
                        </div>
                        <div>Si tu lis ce message, c'est que tu t'égares dans la mission qui t'a été confiée. C'EST PAS BIEN !!</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>Read All Messages</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-messages -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-tasks">
                <li>
                    <a href="#">
                        <div>
                            <p>
                                <strong>Avancement du projet</strong>
                                <span class="pull-right text-muted">40% Complete</span>
                            </p>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <p>
                                <strong>Réunir l'ensemble du groupe</strong>
                                <span class="pull-right text-muted">20% Complete</span>
                            </p>
                            <br/>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                    <span class="sr-only">20% Complete</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <p>
                                <strong>Se reposer</strong>
                                <span class="pull-right text-muted">2% Complete</span>
                            </p>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 2%">
                                    <span class="sr-only">2% Complete (danger)</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>See All Tasks</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-tasks -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-comment fa-fw"></i> New Comment
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                            <span class="pull-right text-muted small">12 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-twitter fa-fw"></i> Ceci est un oiseau
                            <span class="pull-right text-muted small">Y'a pas longtemps</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-envelope fa-fw"></i> Message Sent
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-tasks fa-fw"></i> New Task
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-alerts -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> Profil</a>
                </li>
                <!--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>-->
                <li class="divider"></li>
                <li><a href="login.php" onclick="$_SESSION=array(); session_unset(); session_destroy();"><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <!--<li class="sidebar-search">
                            <!--<div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>-->
                <!-- /input-group -->
                <!--</li>-->
                <!--<li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>-->

                <li>
                    <a href="index.php"><i class="fa fa-home fa-fw"></i> Accueil</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-table fa-fw"></i> Listes<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="list-player.php"> Participants</a>
                        </li>
                        <li>
                            <a href="list-team.php"> Equipes</a>
                        </li>
                        <li>
                            <a href="list-match.php"> Matchs</a>
                        </li>
                        <li>
                            <a href="list-court.php"> Terrains</a>
                        </li>
                        <li>
                            <a href="list-owner.php"> Propriétaires</a>
                        </li>
                        <li>
                            <a href="list-staff.php"> Staff</a>
                        </li>
                        <li>
                            <a href="list-extras.php"> Extras</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-plus fa-fw"></i> Ajouter<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
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
                            <a href="staff.php"> Staff</a>
                        </li>
                        <li>
                            <a href="extra.php"> Extra</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!-- <li>
                            <a href="forms.php"><i class="fa fa-edit fa-fw"></i> Inscription</a>
                        </li> -->
                <!--<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.php">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.php">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.php">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.php">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.php"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.php">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                <!--</li>-->
                <li>
                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> Tournoi<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Poules<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="group-overview.php">Vue d'ensemble</a>
                                </li>
                                <li>
                                    <a href="group.php">Création</a>
                                </li>
                                <li>
                                    <a href="input-group-score.php">Saisir score</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Knock-Off<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="knock-off.php">Création</a>
                                </li>
                                <li>
                                    <a href="input-knock-score.php">Saisir score</a>
                                </li>
                                <li>
                                    <a href="knock-off-results.php?jour=sam">Résultats</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="my-danger" href="reset.php">Réinitialiser</a>
                        </li>
                        <!--<li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                        <!--</li>-->
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-comments-o"></i> Communication<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="contact.php"> Envoyer un mail</a>
                        </li>
                        <!--<li>
                                    <a href="login.php">Login Page</a>
                                </li>-->
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="../../index.php" onclick="$_SESSION=array(); session_unset(); session_destroy();"><i class="fa fa-home fa-fw"></i> Retour au site</a>
                </li>

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>