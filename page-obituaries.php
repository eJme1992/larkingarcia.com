<?php get_header(); 
 include_once 'url.php';
 $texto = pods('default_labels');
$meet_our_staff = $texto->field('meet_our_staff');
$read_more = $texto->field('read_more');
?>

<section id="obituarios" class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="text-center"><h1><?php the_title() ?></h1>
        
    
        <form class="form-inline" action="<?php echo home_url( '/' ); ?>" method="get">
        <div>    
        <input id="s" name="s" value="" type="search" class="form-control">
        <button  id="searchsubmit" type="submit" class="btn btn-default">Search <i class="fas fa-search"></i></button>
        </div>
        </form>
    
 
        </div>
        <?php
        $args = array(
            'post_type' => 'obituaries',
            'orderby' => 'date',
            'order' => 'asc',
            'posts_per_page' => 10,
            'paged' => get_query_var('paged')
        );
        query_posts($args);
        while (have_posts()) : the_post();

            global $post;
            $nacimiento = get_post_meta($post->ID, 'fecha_de_nacimiento', true);
            $deceso = get_post_meta($post->ID, 'fecha_de_deceso', true);
            $thumbID = get_post_thumbnail_id($post->ID);
            $imgDestacada = wp_get_attachment_url($thumbID);
            ?>

            <div class="sinpadding panel"  id="post">
                <div class="row">    
                    <div class="col-md-4 img-cont panel-body">
                        <img src="<?php echo $imgDestacada; ?>" class="img-responsive center-block">
                        </div>

                   
                    <div class="col-md-7 cont_resumen">
                        <div class="resumen">
                            <h3><?php the_title() ?></h3>
                            <h4><?= $nacimiento ?> - <?= $deceso ?></h4>
                            <p><?php echo substr(strip_tags($post->post_content), 0, 500); ?></p>
                        </div>
<div class="resumen">
                        <a href="<?php the_permalink(); ?>" class="btn btn-danger"><i class="fas fa-plus-circle"></i><?=$read_more;?></a>
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
</section>
<?php get_footer(); ?>