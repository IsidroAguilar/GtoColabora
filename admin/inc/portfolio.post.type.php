<?php
// Portfolio Custom Post
$labels = array(
    'name' => _x('Portfolio', 'post type general name', 'gpp_theme'),
    'singular_name' => _x('Portfolio', 'post type singular name', 'gpp_theme'),
    'add_new' => _x('Add New', 'portfolio', 'gpp_theme'),
    'add_new_item' => __('Add New portfolio', 'gpp_theme'),
    'edit_item' => __('Edit Portfolio', 'gpp_theme'),
    'new_item' => __('New portfolio', 'gpp_theme'),
    'view_item' => __('View Portfolio', 'gpp_theme'),
    'search_items' => __('Search Portfolios', 'gpp_theme'),
    'not_found' =>  __('No portfolio found', 'gpp_theme'),
    'not_found_in_trash' => __('No portfolio found in Trash', 'gpp_theme'),
    'parent_item_colon' => ''
  );
register_post_type('portfolio', array(
     'labels' => $labels,
     'singular_label' => __('portfolio'),
     'public' => true,
     'show_ui' => true, // UI in admin panel
     '_builtin' => false, // It's a custom post type, not built in!
     '_edit_link' => 'post.php?post=%d',
     'capability_type' => 'post',
     'hierarchical' => false,
     'rewrite' => array("slug" => "portfolio"), // Permalinks format
     'supports' => array('title','editor','excerpt','thumbnail')
));

register_taxonomy("portfoliocat", array("portfolio"), array("hierarchical" => true, "label" => "Portfolio Category", "singular_label" => "Portfolio Category", "rewrite" => true));

//  Add Columns to Portfolio Edit Screen


function portfolio_edit_columns($portfolio_columns){
	$portfolio_columns = array(
		"cb" 				=> "<input type=\"checkbox\" />",
		"title" 			=> __('Title', 'gpp_theme'),
		"portfolio-tags" 	=> __('Tags', 'gpp_theme'),
		"author" 			=> __('Author', 'gpp_theme'),
		"comments" 			=> __('Comments', 'gpp_theme'),
		"date" 				=> __('Date', 'gpp_theme'),
	);
	$portfolio_columns['comments'] = '<div class="vers"><img alt="Comments" src="' . esc_url( admin_url( 'images/comment-grey-bubble.png' ) ) . '" /></div>';
	return $portfolio_columns;
}



// Styling for the custom post type icon

add_action( 'admin_head', 'wpt_portfolio_icons' );

function wpt_portfolio_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-portfolio .wp-menu-image {
            background: url(<?php echo get_template_directory_uri(); ?>/admin/images/portfolio-icon.png) no-repeat 6px 6px !important;
        }
		#menu-posts-portfolio:hover .wp-menu-image, #menu-posts-portfolio.wp-has-current-submenu .wp-menu-image {
            background-position:6px -16px !important;
        }
		#icon-edit.icon32-posts-portfolio {background: url(<?php echo get_template_directory_uri(); ?>/admin/images/portfolio-32x32.png) no-repeat;}
    </style>

<?php }?>