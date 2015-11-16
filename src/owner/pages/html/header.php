<?php session_start();
	/*if (!array_key_exists("ID", $_SESSION)) {
		header("location: login.php?error=reject");
		exit();
	}*/
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
            <a class="navbar-brand" href="index.php"><i class="fa fa-home"></i> Owner Mode</a>
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
                        <a href="../pages/me.php">
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
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="index.php"><i class="fa fa-home fa-fw"></i> Accueil</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Mes Terrains</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-plus fa-fw"></i> Ajouter Terrain</a>
                    </li>
                    <li>
                        <a href="../pages/me.php"><i class="fa fa-user fa-fw"></i> Mes Infos</a>
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