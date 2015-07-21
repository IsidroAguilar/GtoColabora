<header class="box-header" >
	<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<a href="<?php the_permalink(); ?>"><span class="top-more">
	<?php 			echo of_get_option('text_link');?>
	</span></a>
</header>

<div class="box-container"><?php if(has_post_thumbnail()): ?><a href="<?php the_permalink(); ?>"  class="post-thumb-link"><?php the_post_thumbnail('post-thumb'); ?></a><?php endif; ?>
<footer class="box-footer" >
	<!-- Socials -->
<a target="popup"  onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>','','width=600,height=400')" > <img title="share on facebook" class="social-theme-icon" src="<?php echo get_bloginfo('template_url')."/img/facebook.png";?>"></a>
  <a target="popup"  onclick="window.open('http://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?> - <?php echo get_permalink(); ?>','','width=600,height=400')" > <img title="share on twitter" class="social-theme-icon" src="<?php echo get_bloginfo('template_url')."/img/twitter.png";?>"></a>


  <a target="popup"  onclick="window.open('https://plus.google.com/share?url=<?php echo get_permalink(); ?>','','width=600,height=400')" > <img title="share on google plus" class="social-theme-icon" src="<?php echo get_bloginfo('template_url')."/img/google_plus.png";?>"></a>
 <a target="popup"  onclick="window.open('mailto:?subject=<?php echo get_the_title(); ?>&body=<?php echo get_permalink(); ?>','','width=600,height=400')" >  <img title="share on email"  class="social-theme-icon" src="<?php echo get_bloginfo('template_url')."/img/email.png";?>"></a>




</footer>
</div>
<div class="box-under">#<?php  the_ID(); ?><span class="right"><?php  the_author_posts_link(); ?></span></div>

<?php echo extract_gallery(get_the_content()) ?>
<!-- This post only contains an excerpt of the original post -->
<div class="entry-content">
	<?php // the_excerpt(); ?>
	<?php //wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'gpp_theme' ), 'after' => '</div>' ) ); ?>
	<?php
the_excerpt_max_charlength(120);
// the full text can be found under de single.php
?>
</div>

<?php get_template_part( '/include/meta' ); ?>
