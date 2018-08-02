<?php
get_header();
include_once 'url.php';
$settings = pods('datos_del_sitio');
// $facebook = $settings->field('facebook');
//$twitter = $settings->field('twitter');
//$instagram = $settings->field('instagram');
//$youtube = $settings->field('youtube');
//$googleplus = $settings->field('google_plus');
$telefono = $settings->field('telefono');
$map = $settings->field('mapa');
$horario = $settings->field('horario');
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

<section id="contacto" class="row">
    <div class="col-md-offset-2 col-md-8" style="margin-bottom:15px;">
        <div class="text-center"><h1><?php the_title() ?></h1></div>
        <div class="col-md-10 col-md-offset-1">

            <div class="col-md-6">
                <?php echo do_shortcode("[si-contact-form form='1'] "); ?>
            </div>
            <div class="col-md-6 text-contact">
                <div class="text" style="margin-top:17%;">
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
        </div>
    </div>    
</section>
<?php get_footer(); ?>