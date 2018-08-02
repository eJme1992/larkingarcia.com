<?php
get_header();
include_once 'url.php';
?>

<section id="shop">
    <div class="container">
        <div class="text-center"><h1><b><?php the_title(); ?><i class="fas fa-shopping-bag"></i></b></h1>
            <?php //if (!dynamic_sidebar('sec1')) {}?>
            <?php
            // Get 10 most recent product IDs in date descending order.
            $params = array(
                'posts_per_page' => 6,
                'post_type' => 'product'
            );
            $wc_query = new WP_Query($params);
            if ($wc_query->have_posts()) :
                while ($wc_query->have_posts()) :
                    $wc_query->the_post();
                    global $post;
                    $thumbID = get_post_thumbnail_id($post->ID);
                    $imgDestacada = wp_get_attachment_url($thumbID);
                    ?>
                    <div class="col-md-4">
                        <div class="panel-body">
                            <div class="lista">
                            <div class="img">
                                <img src="<?= $imgDestacada ?>" class="img-responsive center-block wp-post-image">
                            </div>
                            <div class="text">
                            <h4><?php the_title();?></h4>
                            </div>
                            </div>
                        </div>
                    </div>





                <?php
                endwhile;
                wp_reset_postdata(); // (5) 
            else:
                ?>
                <p>
                <?php _e('No Products'); // (6)  ?>
                </p>
            <?php endif; ?> 


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
                'type' => 'array'
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
        




    </div>
</section>
<?php get_footer(); ?>