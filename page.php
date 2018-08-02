<?php
/**
 * @package WordPress
 * @subpackage ID-Peru-Theme-Wordpress
 * @since HTML5 ID 2.0
 */
 get_header(); ?>
 <div class="container">
	<div class="row clearfix">
		<div class="col-md-12">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content(); ?>
			</div>
			<?php edit_post_link(__('Edit this entry','html5reset'), '<p>', '</p>'); ?>
		<?php endwhile; endif; ?>			
		</div>
	</div>
</div>
	
<?php get_footer(); ?>
