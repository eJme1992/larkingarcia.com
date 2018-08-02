<?php
/**
 * @package WordPress
 * @subpackage ID-Peru-Theme-Wordpress
 * @since HTML5 ID 2.0
 */
?>

<?php wp_footer(); ?>
    <?php
 // include_once 'url.php';
  $settings = pods('datos_del_sitio');
 // $facebook = $settings->field('facebook');
 //$twitter = $settings->field('twitter');
 //$instagram = $settings->field('instagram');
 //$youtube = $settings->field('youtube');
 //$googleplus = $settings->field('google_plus');
  $telefono  = $settings->field('telefono');
  $map       = $settings->field('mapa');
  $horario   = $settings->field('horario');
  $direccion = $settings->field('direccion');
 // $texto_legal = $settings->field('texto_legal');
$texto = pods('default_labels');
$call = $texto->field('call');
$espanol = $texto->field('espanol');
$url_espanol = $texto->field('url_espanol');
$our_services = $texto->field('our_services');
$read_more = $texto->field('read_more');
$more_services = $texto->field('more_services');
$welcome = $texto->field('welcome');
$location = $texto->field('location');
$locally_owned_and_operated = $texto->field('locally_owned_and_operated');
$always_available_by_phone = $texto->field('always_available_by_phone');
$obituaries = $texto->field('obituaries');
$view_all_obituaries = $texto->field('view_all_obituaries');
$testimonials = $texto->field('testimonials');
$previous = $texto->field('previous');
$next = $texto->field('next');
?>
<div id="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="text">
                     <p class="tcenter"><i class="fas fa-map-marker-alt"></i><?php echo $direccion; ?>
                    </p>
                    <p class="tcenter"><i class="fas fa-phone-volume"></i><?php echo $telefono; ?></p>
                    <p class="tcenter small">
                        <?= $locally_owned_and_operated; ?> <br/>
                        <a href="<?= $url_espanol ?>"><?= $espanol; ?></a>
                    </p>
                    <p class="tcenter small"><i class="fas fa-clock"></i>
                        <?php echo $horario; ?>
                    </p>
                    <p class="tcenter small"> <strong><?= $always_available_by_phone ?></strong></p>
                </div>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
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
        </div>
    </div>   
</div>
     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
      <script src="<?php echo get_stylesheet_directory_uri() ?>/_/js/bootstrap.min.js"></script>
      <script src="<?php echo get_stylesheet_directory_uri() ?>/_/js/slick.min.js"></script>
      <script src="<?php echo get_stylesheet_directory_uri() ?>/_/js/functions.js?v=0.0.2"></script>-->
</main>
</body>
</html>