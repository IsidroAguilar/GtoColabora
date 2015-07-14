<?php get_header(); ?>

		
		<div class="column-one">
			
			<header>
				<h2 class="post-title">
					   <?php _e("Search Results", "gpp_theme"); ?> / <span><?php echo esc_attr(get_search_query()); ?></span> 
				</h2>
			</header>

			<div id="posts" class="clearfix">
			
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


			<article id="post-<?php the_ID(); ?>" <?php post_class(	array('clearfix', 'box' ) ); ?> role="article">

					<?php get_template_part( '/include/post', get_post_format() ); ?>

					<?php edit_post_link('edit', '<p class="edit-post">', '</p>'); ?>

				</article>
				<?php endwhile; ?>

			</div><!-- //posts -->


			<!-- begin #pagination -->
			<?php if (function_exists("emm_paginate")) { 
				emm_paginate();  
			} else { ?>
			<div class="navigation">
			    <div class="alignleft"><?php next_posts_link('Older') ?></div>
			     <div class="alignright"><?php previous_posts_link('Newer') ?></div>
			</div>
		    <?php } ?>
		    <!-- end #pagination -->

		    <?php else: ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(	array('clearfix', 'box full-width' ) ); ?> role="article">

					<header>
						<h2 class="post-title"><?php _e("No results found")?></h2>
					</header>

				</article>
			<?php endif;?>



			<?php wp_reset_query(); ?>

		</div><!-- end #column-one -->


		<div class="column-two">
		<?php get_sidebar('primary'); ?>
		</div><!-- end #column-two -->


<?php get_footer(); ?>