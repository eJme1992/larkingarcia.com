<?php
/**
 * @package WordPress
 * @subpackage ID-Peru-Theme-Wordpress
 * @since HTML5 ID 2.0
 */
?><!doctype html>
<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
    <!-- the "no-js" class is for Modernizr. -->
    <head id="<?php echo of_get_option('meta_headid'); ?>" data-template-set="ID-Peru-Theme-Wordpress">
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- Always force latest IE rendering engine (even in intranet) -->
        <!--[if IE ]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <![endif]-->
        <?php
        if (is_search())
            echo '<meta name="robots" content="noindex, nofollow" />';
        ?>
        <title><?php wp_title('|', true, 'right'); ?></title>
        <meta name="title" content="<?php wp_title('|', true, 'right'); ?>">
        <?php
        if (true == of_get_option('meta_author'))
            echo '<meta name="author" content="' . of_get_option("meta_author") . '" />';
        if (true == of_get_option('meta_google'))
            echo '<meta name="google-site-verification" content="' . of_get_option("meta_google") . '" />';
        ?>
        <meta name="Copyright" content="Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.">



        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/_/css/bootstrap.css?v=0.0.4"/>
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/_/css/font-awesome.css?v=0.0.4"/>
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/_/css/main.css?v=0.0.4"/>
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/_/css/slick.css?v=0.0.4"/>
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/_/css/slick-theme.css?v=0.0.4"/>
        <link rel="shortcut icon" href="/favicon.ico"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
        
        <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

        <?php
        /*
          j.mp/mobileviewport & davidbcalhoun.com/2010/viewport-metatag
          - device-width : Occupy full width of the screen in its current orientation
          - initial-scale = 1.0 retains dimensions instead of zooming out if page height > device height
          - maximum-scale = 1.0 retains dimensions instead of zooming in if page width < device width
          - minimal-ui = iOS devices have minimal browser ui by default
         */
        if (true == of_get_option('meta_viewport'))
            echo '<meta name="viewport" content="' . of_get_option("meta_viewport") . ' minimal-ui" />';
        /*
          These are for traditional favicons and Android home screens.
          - sizes: 1024x1024
          - transparency is OK
          - see wikipedia for info on browser support: http://mky.be/favicon/
          - See Google Developer docs for Android options. https://developers.google.com/chrome/mobile/docs/installtohomescreen
         */
        if (true == of_get_option('head_favicon')) {
            echo '<meta name=”mobile-web-app-capable” content=”yes”>';
            echo '<link rel="shortcut icon" sizes=”1024x1024” href="' . of_get_option("head_favicon") . '" />';
        }
        /*
          The is the icon for iOS Web Clip.
          - size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for iPhone4 retina display (IMHO, just go ahead and use the biggest one)
          - To prevent iOS from applying its styles to the icon name it thusly: apple-touch-icon-precomposed.png
          - Transparency is not recommended (iOS will put a black BG behind the icon) -->';
         */
        if (true == of_get_option('head_apple_touch_icon'))
            echo '<link rel="apple-touch-icon" href="' . of_get_option("head_apple_touch_icon") . '">';
        ?>

        <!-- aqui empieza -->
        <?php wp_head(); ?>
        <!-- aqui termina -->
    </head>
    <?php
$settings = pods('datos_del_sitio');
$logo = $settings->field('logo');
$telefono  = $settings->field('telefono');
$map       = $settings->field('mapa');
$horario   = $settings->field('horario');
$direccion = $settings->field('direccion');
 
$labels = pods('default_labels');
$call = $labels->field('call');
$hablamos = $labels->field('espanol');
$urlhablamos = $labels->field('url_espanol');

?>


    <body <?php body_class(); ?> style="background-color:#FFFBE1;">
        <?php include_once("googletagmanager.php") ?>

        <main data-section="tab2" class="wrapper">
            <!-- HEADER DEL SITIO-->
            <header id="header" class="full-width">
                <div class="container">
                 <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $logo['guid']; ?>" class="img-responsive animated slideInUp logo" alt="Logo"/></a>
                        </div>
                       
                        <div class="col-md-6">
                            <div class="w-call">
                                <h4><?= $call;?> <?php echo $telefono; ?></h4><span><a href="<?= $urlhablamos;?>"><?= $hablamos;?></a></span>
                            </div>
                        </div>
                 </div>
                </div>
            </header>
            <div id="nav" class="nav-main">
                <div class="container">
                    <nav class="navbar">
                      
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                    <i class="fas fa-align-justify fa-3x"></i>                      
                                </button>

                            </div>
                            <div class="collapse navbar-collapse" id="myNavbar">


                                <?php
                                wp_nav_menu(array(
                                    'menu' => 'main-mobile',
                                    'theme_location' => 'primary',
                                    'container' => '',
                                    'container_class' => 'navbar-nav',
                                        )
                                );
                                ?>
                            </div>
                      
                    </nav>
                </div>
            </div>
<?php $layerSlider=get_post_meta($post->ID, 'slider', true);
if ( $layerSlider ) { ?>
<section id="slides">
  <div class="container-fluid sin-padding">
    <?php echo do_shortcode('[rev_slider alias="'.$layerSlider.'"]'); ?> 
  </div>
</section>    
<?php } ?>