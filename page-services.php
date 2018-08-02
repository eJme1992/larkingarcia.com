<?php
get_header();
include_once 'url.php';

$labels = pods('default_labels');
$read_more = $labels->field('read_more');

?>
<section id="services" class="row">
    <div class="col-md-8 col-md-offset-2 bgservices">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
       <?php
        $args = array(
            'post_type' => 'services',
            'orderby' => 'date',
            'order' => 'asc',
            'posts_per_page' => -1
        );

        $servicio = new WP_query($args);

        if ($servicio->have_posts()) : while ($servicio->have_posts()) : $servicio->the_post();
                $title = get_the_title($post->ID);
                $contenido = get_post_meta($post->ID, 'descripcion_corta', true);
                $allcontent = get_the_content();
                $nombre = get_post_meta($post->ID, 'nombre', true);
                $thumbID = get_post_thumbnail_id($post->ID);
                $imgDestacada = wp_get_attachment_url($thumbID);
        ?>
        <div class="row list-servicio">
            <div class="col-md-4"><img src="<?php echo $imgDestacada ?>" alt="<?=$title?>" ?></div>
            <div class="col-md-8">
                <h3 class="titulo"><?=$title;?></h3>
                <em class="desc-serv"><?=$contenido;?></em>
                <?=$allcontent;?>
                <p class="enl-serv"><a href="<?php the_permalink(); ?>"><?=$read_more ;?></a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <img class="img-responsive center-block" src="<?php echo get_stylesheet_directory_uri() ?>/_/img/Separador4.png"/>
            </div>
        </div>
        <?php
        endwhile;
        endif;
        ?>
    </div>
</section>
<?php get_footer(); ?>