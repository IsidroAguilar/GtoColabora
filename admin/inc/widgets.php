<?php
/*********************************************************************************************

Register Global Sidebars

*********************************************************************************************/
function site5framework_widgets_init() {
	
	register_sidebar( array (
    'name' => __( 'Sidebar Widgets', 'gpp_theme' ),
    'id' => 'primary',
    'before_widget' => '<div id="%1$s" class="widget_sidebar %2$s" ><div class="widget_inner">',
    'after_widget' => "</div></div>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
	) );
	register_sidebar( array (
    'name' => __( 'First Sidebar Widgets', 'gpp_theme' ),
    'id' => 'primary_first',
    'before_widget' => '<div id="%1$s" class="widget_sidebar %2$s" ><div class="widget_inner">',
    'after_widget' => "</div></div>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
	) );
	register_sidebar( array (
    'name' => __( 'Second Sidebar Widgets', 'gpp_theme' ),
    'id' => 'primary_second',
    'before_widget' => '<div id="%1$s" class="widget_sidebar %2$s" ><div class="widget_inner">',
    'after_widget' => "</div></div>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
	) );
    register_sidebar( array (
    'name' => __( 'Footer Widgets', 'gpp_theme' ),
    'id' => 'footer',
    'before_widget' => '<div id="%1$s" class="widget_footer %2$s" ><div class="widget_inner">',
    'after_widget' => "</div></div>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );

}

add_action( 'init', 'site5framework_widgets_init' );



/*********************************************************************************************

related thumbail Widget

*********************************************************************************************/
class theme_ggp_related_thumb_widget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'Theme : Related Thumb Widget', array( 'description' => 'Show related thumbail  ' ) );
    }

    /*
     * Displays the widget form in the admin panel
     */
    function form( $instance ) {
    	$widget_title = esc_attr( $instance['widget_title'] );
        $num_thumb = esc_attr( $instance['num_thumb'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e('Widget Title:', 'gpp_theme') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo $widget_title; ?>" />
        </p>

     
        <p>
            <label for="<?php echo $this->get_field_id( 'num_thumb' ); ?>"><?php _e('Number of thumbs:', 'gpp_theme') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'num_thumb' ); ?>" name="<?php echo $this->get_field_name( 'num_thumb' ); ?>" type="text" value="<?php echo $num_thumb; ?>" />
        </p>

<?php
    }
/*
 * Renders the widget in the sidebar
 */
function widget( $args, $instance ) {
echo $args['before_widget'];
?>


        <!-- start related widget -->
         <?php echo $args['before_title']; ?><?php echo $instance['widget_title']; ?><?php echo $args['after_title']; ?>
<div class="relatedposts">  
 
<?php  
 
if (is_single()) {
	global $post;
	$current_post = $post->ID;
	$categories2 = array();
	$categories = get_the_category();
foreach ($categories as $category) {
$categories2[]=$category->term_id ;

	}
	$categories2=implode(',',$categories2);
	$posts=get_posts('numberposts='.$instance['num_thumb'].'&category='. $categories2 . '&exclude=' . $current_post);


foreach($posts as $post) :
	?>
    <div class="relatedthumb">  
        <a rel="external" href="<? the_permalink()?>"><?php the_post_thumbnail(array(106,106)); ?><br />  
        </a>  
    </div>  

	<?php endforeach; ?>

	
	<?php
		}
	wp_reset_query();
?>
   </div> 
        <!-- end thumbail widget -->


        <?php
        echo $args['after_widget'];
    }
};

// Initialize the widget
add_action( 'widgets_init', create_function( '', 'return register_widget( "theme_ggp_related_thumb_widget" );' ) );



/*********************************************************************************************

related category Widget

*********************************************************************************************/
class theme_ggp_related_cat_widget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'Theme : Related category Widget', array( 'description' => 'Show related category  ' ) );
    }

    /*
     * Displays the widget form in the admin panel
     */
    function form( $instance ) {
    	$widget_title = esc_attr( $instance['widget_title'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e('Widget Title:', 'gpp_theme') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo $widget_title; ?>" />
        </p>

   

<?php
    }
/*
 * Renders the widget in the sidebar
 */
function widget( $args, $instance ) {
echo $args['before_widget'];
?>


        <!-- start related widget -->
         <?php echo $args['before_title']; ?><?php echo $instance['widget_title']; ?><?php echo $args['after_title']; ?>
<div class="relatedposts">  
 
<?php  
 
if (is_single()) {
	global $post;
	$current_post = $post->ID;

	$categories = get_the_category();
	$cat=array();
	foreach ($categories as $category) {
  	$cat[]= "<a href=".get_category_link( $category->term_id ).">".$category->cat_name."</a>";
  }
  echo (implode(', ',$cat));
		}
	wp_reset_query();
?>
   </div> 
        <!-- end category widget -->


        <?php
        echo $args['after_widget'];
    }
};

// Initialize the widget
add_action( 'widgets_init', create_function( '', 'return register_widget( "theme_ggp_related_cat_widget" );' ) );



/*********************************************************************************************

related tag Widget

*********************************************************************************************/
class theme_ggp_related_tag_widget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'Theme : Related tag Widget', array( 'description' => 'Show related tag  ' ) );
    }

    /*
     * Displays the widget form in the admin panel
     */
    function form( $instance ) {
    	$widget_title = esc_attr( $instance['widget_title'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e('Widget Title:', 'gpp_theme') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo $widget_title; ?>" />
        </p>

   

<?php
    }
/*
 * Renders the widget in the sidebar
 */
function widget( $args, $instance ) {
echo $args['before_widget'];
?>


        <!-- start related widget -->
         <?php echo $args['before_title']; ?><?php echo $instance['widget_title']; ?><?php echo $args['after_title']; ?>
<div class="relatedposts">  
 
<?php  
 
if (is_single()) {
	global $post;
	$current_post = $post->ID;
	$tags = get_the_tags();
	$tag=array();
	if ($tags) {foreach ($tags as $tag) {
  	$tag1[]= "<a href=".get_tag_link( $tag->term_id ).">".$tag->name."</a>";
  }
  echo (implode(', ',$tag1));
		}}
	wp_reset_query();
?>
   </div> 
        <!-- end tag widget -->


        <?php
        echo $args['after_widget'];
    }
};

// Initialize the widget
add_action( 'widgets_init', create_function( '', 'return register_widget( "theme_ggp_related_tag_widget" );' ) );
?><?php


/*********************************************************************************************

Share button widget

*********************************************************************************************/
class theme_ggp_share_widget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'Theme : Share button Widget', array( 'description' => 'Display Share buttons on post  ' ) );
    }

    /*
     * Displays the widget form in the admin panel
     */
    function form( $instance ) {
    	$widget_title = esc_attr( $instance['widget_title'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e('Widget Title:', 'gpp_theme') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo $widget_title; ?>" />
        </p>

   

<?php
    }
/*
 * Renders the widget in the sidebar
 */
function widget( $args, $instance ) {
echo $args['before_widget'];
?>


        <!-- start related widget -->
         <?php echo $args['before_title']; ?><?php echo $instance['widget_title']; ?><?php echo $args['after_title']; ?>
<div class="social_widget">  
 <?php $postid = get_the_ID();$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($postid),'large'); ?> 
 <a target="_blank" href="http://m.pinterest.com/pin/create/button/?media=<?php echo $large_image_url[0]; ?>&url=<?php echo get_permalink(); ?>&description=<?php echo get_the_title(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/ico/pinterest.png"></a>
  <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/ico/fb_1.png"></a>
  <a target="_blank" href="http://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?> - <?php echo get_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/ico/twitter_1.png"></a>
  <a target="_blank" href="mailto:?subject=<?php echo get_the_title(); ?>&body=<?php echo get_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/ico/email.png"></a>
  <a target="_blank" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/ico/google_plus.png"></a>

<?php  
 
	wp_reset_query();
?>
   </div> 
        <!-- end tag widget -->


        <?php
        echo $args['after_widget'];
    }
};

// Initialize the widget
add_action( 'widgets_init', create_function( '', 'return register_widget( "theme_ggp_share_widget" );' ) );
?>