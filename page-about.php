<?php
get_header();
include_once 'url.php';
$texto = pods('default_labels');
$meet_our_staff = $texto->field('meet_our_staff');
?>

<section id="about">
    <div class="row">
        <div class="col-md-offset-2 col-md-8" style=" background-color:#F5F1EE;">
            <div class="text-center">
                <h1><b><?php the_title() ?></b></h1>


            </div>



            <?php
            if (have_posts()): while (have_posts()): the_post();
                    global $post;
                    $thumbID = get_post_thumbnail_id($post->ID);
                    $imgDestacada = wp_get_attachment_url($thumbID);
                    ?>
                    <div class="text-justify">
                        <img src="<?php echo $imgDestacada; ?>" class="img-responsive center-block">
                        <?php the_content(); ?>
                        <hr>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>


            <div class="text-center">
                <hr>
                <h1><b><?= $meet_our_staff ?></b></h1>      
            </div>


            <?php
            $args = array(
                'post_type' => 'quienes_somos',
                'orderby' => 'date',
                'order' => 'asc',
                'posts_per_page' => 10,
                'paged' => get_query_var('paged')
            );
            query_posts($args);
            while (have_posts()) : the_post();

                global $post;

                $thumbID = get_post_thumbnail_id($post->ID);
                $imgDestacada = wp_get_attachment_url($thumbID);
                ?>

                <div>
                    <div class="row">    
                        <div class="col-md-4 panel-body">
                            <img src="<?php echo $imgDestacada; ?>" class="img-responsive img-rounded img-thumbnail center-block">
                        </div>


                        <div class="col-md-7">
                            <div>
                                <h2><?php the_title() ?></h2>
                                <div class="text-justify"><?php the_content(); ?></div>
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-12"><img class="img-responsive center-block" src="<?php echo get_stylesheet_directory_uri() ?>/_/img/Separador4.png"/></div>
                    </div>
                </div>

            <?php endwhile; ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>
