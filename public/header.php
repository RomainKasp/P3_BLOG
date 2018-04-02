<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $titre; ?></title>
        <meta name="Billet pour l'Alaska - Jean Forteroche" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="./css/bootstrap.min.css">

        <!--For Plugins external css-->
        <link rel="stylesheet" href="./css/plugins.css" />

        <link rel="stylesheet" href="./css/raleway-webfont.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="./css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="./css/responsive.css" />
		<?php
		if ($Tiny)
		echo '<!--TinyMce-->
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
		<script type="text/javascript" src="../public/js/tiny.js"></script>'; ?>
    </head>