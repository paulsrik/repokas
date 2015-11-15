<?php

/**
 * Template Name: Tasks
 */
?>

<?php get_header(); ?>

        <div id="container">
            <div id="content">
				<div class="wrap">

					<?php
					$type = 'tasks';
					$args=array(
					  'post_type' => $type,
					  'post_status' => 'publish',
					  'posts_per_page' => -1,
					  'meta_query' => array(
						array(
								'key' => 'task_deadline',
								'value'   => array( time(), strtotime('+ 7 days') ),
								'compare' => 'BETWEEN',
							),
					  ));

					$my_query = null;
					$my_query = get_posts($args);
					foreach($my_query as $post){
						 setup_postdata($post);
						 ?>
						<div class="box">
							<div class="boxInner">
							<?php 
								if ( has_post_thumbnail() ) {
									the_post_thumbnail();
								} 
							?>
							</div>
						
						<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
							<p><?php the_excerpt() ?></p>
							<button id="button" onclick="window.location.href='<?php the_permalink() ?>'">Full Task</button>
						</div>
						<?php
					  /*}*/

					}
					wp_reset_query();  // Restore global post data stomped by the_post().
					?>
				</div>
            </div><!-- #content -->
        </div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>