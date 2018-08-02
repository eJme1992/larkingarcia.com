<?php
get_header();
include_once 'url.php';
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


<section id="localizacion"  class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="text-center"><h1><?php the_title() ?></h1>

        </div>
        <?php
        $args = array(
            'post_type' => 'locations',
            'orderby' => 'date',
            'order' => 'asc',
            'posts_per_page' => 10,
            'paged' => get_query_var('paged'),
        );
        query_posts($args);
        while (have_posts()): the_post();

            global $post;
            $mapa = get_post_meta($post->ID, 'mapa', true);
            $direccion = get_post_meta($post->ID, 'direccion', true);
            $telefono = get_post_meta($post->ID, 'telefono', true);
            $thumbID = get_post_thumbnail_id($post->ID);
            $imgDestacada = wp_get_attachment_url($thumbID);
            ?>

            <div class="sinpadding"  id="post">
                <div class="row center-block">
                    <div class="panel panel-body center-block">
                        <div class="col-md-6 text-center" style="background-image: url('<?php echo $imgDestacada; ?>'); background-size: cover; background-position: center center;  height:350px;">
                            <h2 style="color:#fff;padding-top:30%;"><b><?php the_title() ?></b></h2>
                        </div>


                        <div class="col-md-6">
                            <div>
                                <iframe src="<?php echo $mapa; ?>" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <!---->
                        <div class="col-md-6">
                            <h4><i class="fas fa-phone-volume"></i>  <?php echo $telefono; ?></h4>
                        </div>


                        <div class="col-md-6">
                            <h4><i class="fas fa-map-marker-alt"></i> <?php echo $direccion; ?></h4>

                        </div>
                        <img class="img-responsive center-block" src="<?php echo get_stylesheet_directory_uri() ?>/_/img/Separador3.png"/>
                        <div class="col-md-12 text-center" style="margin-top:5px;">
                            <a href="<?php the_permalink(); ?>" class="btn btn-danger btn-lg"><?=$read_more;?><i class="fas fa-plus-circle"></i></a>

                        </div>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>

        <?php
// Wordpress Pagination
        $big = 999999999; // need an unlikely integer
        $links = paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'prev_text' => '<',
            'next_text' => '>',
            'type' => 'array',
        ));
        if (!empty($links)) {
            ?>
            <div class="text-center" style=" text-align: center; width:100%">
                <ul class="pagination pagination-lg" >
                    <?php
                    foreach ($links as $link) {
                        ?>
                        <li><?php echo $link; ?></li>
                        <?php
                    }
                    wp_reset_query();
                    ?>
                </ul>
            </div>
<?php } ?>
    </div>
</section>
<?php get_footer(); ?>