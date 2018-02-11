    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		
		<!--<div class='preloader'><div class='loaded'>&nbsp;</div></div>-->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="?page=home"><img src="./public/images/logo.png" alt="" /></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">

                        <li <?php echo $menu1; ?> ><a href="?page=home">Accueil</a></li>
                        <li <?php echo $menu2; ?> ><a href="?page=about">A propos de l'auteur</a></li>
                        <li <?php echo $menu3; ?> ><a href="?page=latest">Dernières parutions</a></li>
                        <li <?php echo $menu4; ?> ><a href="?page=summary">Sommaire</a></li>

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>