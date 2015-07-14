<?php
/*
The comments page 
*/

// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if ( post_password_required() ) { ?>
  	<div class="help">
    	<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','gpp_theme'); ?></p>
  	</div>
  <?php
    return;
  }
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>

	<div id="comment-nav">
		<ul>
	  		<li><?php previous_comments_link() ?></li>
	  		<li><?php next_comments_link() ?></li>
	 	</ul>
	</div>
	
	<div id="comments"><h3><?php comments_number('<span>No</span> Comments', '<span>One</span> Comment', '<span>%</span> Comments' );?></h3></div>
	
	<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=site5framework_comments'); ?>
	</ol>
	
	<div id="comment-nav">
		<ul>
	  		<li><?php previous_comments_link() ?></li>
	  		<li><?php next_comments_link() ?></li>
		</ul>
	</div>
  
	<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
    	<!-- If comments are open, but there are no comments. -->

	<?php else : // comments are closed ?>
	<!-- If comments are closed. -->
	<p class="nocomments"><?php _e('Comments are closed.','gpp_theme'); ?></p>

	<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>

<section id="respond" class="respond-form">

	<div id="comment-form-title"><h3><?php _e( 'So, what do you think ?', 'gpp_theme' ); ?></h3></div>
	
	<div id="cancel-comment-reply">
		<p class="small"><?php cancel_comment_reply_link(); ?></p>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
  	<div class="help">
  		<p><?php _e("You must be  ", "gpp_theme"); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e("logged in ", "gpp_theme"); ?></a> <?php _e("to post a comment. ", "gpp_theme"); ?></p>
  	</div>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	
	<ul id="comment-form-elements">

	<?php if ( is_user_logged_in() ) : ?>

	<li class="comments-logged-in-as"><?php _e("Logged in as  ", "gpp_theme"); ?><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e("Log out &raquo; ", "gpp_theme"); ?></a></li>
	
	
	<?php else : ?>
	
		<li>
		  <label for="author"><?php _e("Your Name ", "gpp_theme"); ?></label>
		  <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
		</li>
		
		<li>
		  <label for="email"><?php _e("Your Mail ", "gpp_theme"); ?></label>
		  <input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
		</li>
		
		<li>
		  <label for="url"><?php _e("Your Website ", "gpp_theme"); ?></label>
		  <input type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" tabindex="3" />
		</li>
	
	<?php endif; ?>
	
		<li> 
			<label for="comment"><?php _e("Message ", "gpp_theme"); ?></label> 
			<textarea name="comment" id="comment" tabindex="4"></textarea>
		</li>
	
	
	  <input name="submit" type="submit" id="submitcomment" class="submitbutton" tabindex="5" value="<?php _e("POST COMMENT", "gpp_theme"); ?>" />
	  <?php comment_id_fields(); ?>
	
	<?php do_action('comment_form', $post->ID); ?>
	</ul>
	</form>
	
	<?php endif; // If registration required and not logged in ?>
</section>

<?php endif; // if you delete this the sky will fall on your head ?>
