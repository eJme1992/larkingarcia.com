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
    $mapa = get_post_meta($post->ID, 'mapa', true);
    $contenido = get_the_content($post->ID);
    $direccion = get_post_meta($post->ID, 'direccion', true);
    $telefono = get_post_meta($post->ID, 'telefono', true);
    $thumbID = get_post_thumbnail_id($post->ID);
    $imgDestacada = wp_get_attachment_url($thumbID);
    ?>

    <section  id="loc">

        <div class="text-center" style="background-image: url('<?php echo $imgDestacada; ?>'); background-size: cover; height:500px; background-position: center center;">
            <h1 style="color:#fff; padding-top:17%; font-size:11vmin;"><b><?php the_title() ?></b></h1>
        </div>

        <div  style="background-color:#fff;">
            <div class="container">


                <div class="col-md-4" style="background-color:#EEEEEE;">
                    <div class="panel-body"> 
                        <h3><label><i class="fas fa-phone-volume"></i> <?=$phone?>:</label>  <?php echo $telefono; ?></h3>  
                        <h3><label><i class="fas fa-map-marker-alt"></i> <?=$address?>:</label> <?php echo $direccion; ?></h3>   
                        <iframe src="<?php echo $mapa; ?>" width="100%"  frameborder="0" style="border:0" allowfullscreen></iframe>
                        <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri() ?>/_/img/separador2.png"/>             
                        <a href="<?=$flowers?>" target="_blank" class="btn-success btn-lg center-block text-center"><?=$sending_flowers?> </a>
                        <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri() ?>/_/img/separador2.png"/>             
                        <a href="<?= $url ?>shop"  class="btn-warning btn-lg center-block text-center"><?=$shop_merchandise?> <i class="fas fa-shopping-cart"></i></a>
                    </div>
                </div>

                <div class="col-md-8 text-justify">
                    <?= $contenido; ?>
                </div>
            </div>
        </div>
    </section>

    <?php
endwhile;
get_footer();
?>