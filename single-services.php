<?php
include_once 'url.php';
get_header();
while (have_posts()): the_post();
    global $post;
    $title = get_the_title($post->ID);
    $contenido = get_post_meta($post->ID, 'descripcion_corta', true);
    $thumbID = get_post_thumbnail_id($post->ID);
    $imgDestacada = wp_get_attachment_url($thumbID);
    ?>

    <section class="row" id="obituario">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-body center-block">    

                <div class="col-md-6">
                    <img class="center-block img-responsive img-rounded" src="<?= $imgDestacada ?>">
                </div>

                <div class="col-md-6 text-center">
                    <h1><b><?= $title ?></b></h1>
                    <div class="text-center"><h3><b><?php echo $contenido; ?></b></h3></div>

                    <a href="http://larkingarcia.com/contact/" class="btn-danger btn-lg center-block"> Contact </a>
                </div>
                <img class="img-responsive center-block" src="<?php echo get_stylesheet_directory_uri() ?>/_/img/Separador4.png"/>
                <div class="text-justify contenido">

                    <?php the_content(); ?>
                </div>



            </div>
        </div>

    </section>

    <?php
endwhile;
get_footer();
?>