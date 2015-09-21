<?php get_header(); ?>


		<div class="column-one">




			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


			<article id="post-<?php the_ID(); ?>" <?php post_class(	array('clearfix ' ) ); ?> role="article">

				<header class="post-simple-header">
					<h2 class="post-title"><?php the_title(); ?></h2>

				</header>

				<div class="content-styler">
					<?php the_content() ?>
				</div>

			</article>

			<?php endwhile; ?>



			<!-- begin #pagination -->
			<div class="navigation">
			<?php if (function_exists("emm_paginate")) {
					emm_paginate();
				 } else { ?>

		    <?php } ?>

		     	<div class="next alignleft"><?php next_posts_link('Older') ?></div>
		        <div class="prev alignright"><?php previous_posts_link('Newer') ?></div>
		    </div>
		    <!-- end #pagination -->

			<?php endif;?>

			<?php wp_reset_query(); ?>

		</div><!-- end #column-one -->



<?php get_footer(); ?>
