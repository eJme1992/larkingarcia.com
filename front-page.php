<?php
/**
 * @package WordPress
 * @subpackage ID-Peru-Theme-Wordpress
 * @since HTML5 ID 2.0
 */
get_header();

include_once 'url.php';
$settings = pods('datos_del_sitio');
$logo = $settings->field('logo');
$telefono = $settings->field('telefono');
$map = $settings->field('mapa');
$horario = $settings->field('horario');
$direccion = $settings->field('direccion');

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

<section id="services" class="section-home">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section">
                    <h2><?= $our_services ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'services',
                'orderby' => 'date',
                'order' => 'asc',
                'posts_per_page' => 4
            );

            $servicio = new WP_query($args);

            if ($servicio->have_posts()) : while ($servicio->have_posts()) : $servicio->the_post();
                    $title = get_the_title($post->ID);
                    $contenido = get_post_meta($post->ID, 'descripcion_corta', true);

                    $nombre = get_post_meta($post->ID, 'nombre', true);
                    ?>
                    <div class="col-md-3">
                        <div class="item slider-item-services">
                            <h3 class="title"><?= $title; ?></h3>
                            <div class="w-body">
                                <div class="detail">
                                    <p>
                                        <?= $contenido; ?>
                                    </p>
                                    <div class="modal-footer"><a href="<?php the_permalink(); ?>"><?= $read_more; ?></a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                endwhile;
            endif;
            ?>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="w-btn"><a href="<?= $url ?>services" class="btn btn-primary"><?= $more_services; ?></a></div>
            </div>
        </div>
    </div>
</section>
<section id="welcome">
    <div class="container">
        <div class="text">
            <h2><?= $welcome; ?></h2>
            <img src="<?php echo $logo['guid']; ?>" class="img-responsive center-block" alt="Logo"/>
        </div>
    </div>
</section>
<section id="about-us" class="section-home">
    <div class="container">
        <div class="row">
            <?php
            if (have_posts()) : while (have_posts()) : the_post();
                    $thumbID = get_post_thumbnail_id($post->ID);
                    $imgDestacada = wp_get_attachment_url($thumbID);
                    ?>
                    <div class="col-md-6">
                        <div class="text text-justify">
        <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="image">
                            <div class="image"><img src="<?php echo $imgDestacada; ?>"/></div>
                        </div>
                    </div>
                <?php endwhile;
            endif;
            ?>
        </div>
    </div>
</section>
<section id="location" class="section-home">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section">
                    <h2><?= $location; ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="map"><iframe src="<?php echo $map; ?>" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe></div>
            </div>
            <div class="col-md-6">
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
        </div>
    </div>
</section>
<section id="obituries" class="section-home">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section">
                    <h2><?= $obituaries ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'obituaries',
                'orderby' => 'date',
                'order' => 'desc',
                'posts_per_page' => 15
            );

            $servicio = new WP_query($args);

            if ($servicio->have_posts()) : while ($servicio->have_posts()) : $servicio->the_post();
                    $title = get_the_title($post->ID);
                    $contenido = get_the_content($post->ID);
                    $nacimiento = get_post_meta($post->ID, 'fecha_de_nacimiento', true);
                    $deceso = get_post_meta($post->ID, 'fecha_de_deceso', true);
                    $thumbID = get_post_thumbnail_id($post->ID);
                    $imgDestacada = wp_get_attachment_image_src($thumbID, 'img-obituario');
                    ?>
                    <div class="col-md-5ths">
                        <div class="item item-obituary center-block">
                            <a href="<?php the_permalink(); ?>">    <div class="image"><img class="img-responsive" src="<?php echo $imgDestacada[0]; ?>"/></div>
                                <h4 class="title"><?= $title; ?></h4>
                                <p><b><u><?= $nacimiento ?> - <?= $deceso ?></u></b></p </a>
                        </div>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="w-btn"><a class="btn btn-primary" href="<?= $url ?>obituaries"><?= $view_all_obituaries ?></a></div>
            </div>
        </div>
    </div>
</section>
<section id="testimonio" class="row">
    <div class="col-md-12">
        <div class="title-section text-center">
            <h2><?= $testimonials; ?></h2>
        </div>
    </div>
    <div class="col-md-12">
        <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
                $args = array(
                    'post_type' => 'testimonios',
                    'orderby' => 'date',
                    'order' => 'asc',
                    'posts_per_page' => -1
                );
                $servicio = new WP_query($args);
                $i = 0;
                if ($servicio->have_posts()) : while ($servicio->have_posts()) : $servicio->the_post();
                        ?>

                        <li data-target="#myCarousel" data-slide-to="<?= $i; ?>" <?php
                        if ($i == 0) {
                            echo "class='active'";
                        }
                        ?>></li>


                        <?php
                        $i++;
                    endwhile;
                endif;
                ?>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner slider-slick">

                <?php
                $args = array(
                    'post_type' => 'testimonios',
                    'orderby' => 'date',
                    'order' => 'asc',
                    'posts_per_page' => -1
                );
                $servicio = new WP_query($args);
                $i = 0;
                if ($servicio->have_posts()) : while ($servicio->have_posts()) : $servicio->the_post();
                        $title = get_the_title($post->ID);
                        $contenido = get_the_content($post->ID);
                        $link = get_post_meta($post->ID, 'link', true);
                        $thumbID = get_post_thumbnail_id($post->ID);
                        $imgDestacada = wp_get_attachment_url($thumbID);
                        ?>    

                        <div class="item slider-item  <?php
                        if ($i == 0) {
                            echo "active";
                        }
                        ?>">


                            <div class="text col-md-6 col-md-offset-3">
                                <div class="text-justify">   <h3><?= $contenido; ?></h3></div>
                                <div class="text-right">   <h4><?= $title; ?></h4></div>
                            </div>

                        </div>

                        <?php
                        $i++;
                    endwhile;
                endif;
                ?>


            </div>

            <!-- Left and right controls -->
            <a class="left" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only"><?= $previous; ?></span>
            </a>
            <a class="right " href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only"><?= $next; ?></span>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
