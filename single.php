<?php get_header(); ?>


		<div class="column-one-bis">




			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(	array('clearfix ' ) ); ?> role="article">

				<header>
					<h2 class="post-title"><?php the_title(); ?></h2>
				</header>

				<div class="meta clearfix">
									<span class="post-author"><?php  the_author_posts_link(); ?></span> |

					<span class="post-date"><?php echo get_the_date(); ?></span>
				</div>

				<!-- Post Formats-->
				<?php
				$post_format = get_post_format();
				?>


					<?php
					$postid = $post->ID;
					?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(	array('clearfix', 'box' ) ); ?> role="article">
					<!-- If we want to show a custom page for every comunity this should change -->
					<?php get_template_part( '/include/post' ); ?>
</article>

</div>
<div class="clearfix"></div>

				<div class="entry-content">
					<!-- Full text for post -->
					<?php the_content(); ?>

					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'gpp_theme' ), 'after' => '</div>' ) ); ?>
				</div>



			</article>

			<?php endwhile; ?>







		    <?php

		    // Prev/Next Post with Thumbnails
			global $post;
			$post = get_post($post_id);

			$next_post = get_next_post();
			$previous_post = get_previous_post();

        	?>
        	<?php if($previous_post) : ?>
	        	<div class="prev-post">

	        		<a href="<?php echo get_permalink( $previous_post->ID ) ?>"><span class="arrow"><span></a>
	        	</div>
            <?php endif; ?>
            <?php if($next_post) : ?>
	        		<div class="next-post">
	        		<a href="<?php echo get_permalink( $next_post->ID ) ?>"><span class="arrow"><span></a>
	        	</div>
            <?php endif; ?>

            <?php comments_template(); ?>

			<?php endif;?>

			<?php wp_reset_query(); ?>


<?php get_footer(); ?>
