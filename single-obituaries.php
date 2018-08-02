<?php
include_once 'url.php';
       $labels = pods('default_labels');
        $phone = $labels->field('phone');
        $address  = $labels->field('address');
        $flowers  = $labels->field('flowers');
        $sending_flowers  = $labels->field('sending_flowers');
        $shop_merchandise  = $labels->field('shop_merchandise');
get_header();
while (have_posts()): the_post();
    global $post;
    $title = get_the_title($post->ID);
    $contenido = get_the_content($post->ID);
    $nacimiento = get_post_meta($post->ID, 'fecha_de_nacimiento', true);
    $deceso = get_post_meta($post->ID, 'fecha_de_deceso', true);
    $thumbID = get_post_thumbnail_id($post->ID);
    $imgDestacada = wp_get_attachment_url($thumbID);
    ?>

    <section class="row"  id="obituario">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel-body center-block"> 
                <div class="col-md-6">
                    <img class="center-block img-responsive img-rounded" src="<?= $imgDestacada ?>">
                </div>

                <div class="col-md-6 text-center">
                    <h1><b><?= $title ?></b></h1>
                    <h3><b><u><?= $nacimiento ?> - <?= $deceso ?></u></b></h3>
                    <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri() ?>/_/img/separador2.png"/>             
                    <a href="<?=$flowers?>" target="_blank" class="btn-success btn-lg center-block"><?=$sending_flowers?> </a>
                </div>
                <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri() ?>/_/img/Separador.png"/>
                <div class="col-md-offset-1 col-md-10 contenido text-justify">

                    <?= $contenido ?>
                </div>

                <div class="col-md-12">

                    <?php comments_template(); ?>


                </div>


            </div>
        </div>

    </section>

    <?php
endwhile;
get_footer();
?>