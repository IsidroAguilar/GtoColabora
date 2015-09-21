<?php get_header(); ?>


		<div class="column-one">

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
