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
?>

<section id="contacto" class="row">
    <div class="col-md-offset-2 col-md-8" style="margin-bottom:15px;">
        <div class="text-center"><h1><?php the_title() ?></h1></div>
        <div class="col-md-10 col-md-offset-1">

            <div class="col-md-6" >
                <div class="text-center"> <h2>Your message has been sent successfully</h2></div>
                <div class="text-justify">
                    Thank you for communicating with us your message will be answered within the next 48 hours
                </div>
                <a class="btn" href="http://larkingarcia.com/contact/">Return</a>
            </div>
            <div class="col-md-6">
                <div class="text" style="margin-top:17%;">
                    <p class="tcenter"><i class="fas fa-map-marker-alt"></i><?php echo $direccion; ?>
                    </p>
                    <p class="tcenter"><i class="fas fa-phone-volume"></i><?php echo $telefono; ?></p>
                    <p class="tcenter small">Locally Owned and Operated <br/>
                    <Habl>ó Español</Habl>
                    </p>
                    <p class="tcenter small"><i class="fas fa-clock"></i>
                        <?php echo $horario; ?>
                    </p>
                    <p class="tcenter small"> <strong>ALWAYS available by phone</strong></p>
                </div>
            </div>
        </div>
    </div>    
</section>
<?php get_footer(); ?>