<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package eleos
 */

if ( ! function_exists( 'eleos_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function eleos_entry_meta() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><!--<time class="updated" datetime="%3$s">%4$s</time>-->';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'eleos' ),
        $time_string . '<span class="separator">|</span>'
	);

    echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

    $format = get_post_format();
    switch ($format) {
        case $format == 'video':
            echo "<i class='fa fa-film'></i>";
            break;
        case $format == 'audio':
            echo "<i class='fa fa-music'></i>";
            break;
        case $format == 'gallery':
            echo "<i class='fa fa-picture-o'></i>";
            break;      
        case $format == 'quote':
            echo "<i class='fa fa-quote-right'></i>";
            break;
        case $format == 'image':
            echo "<i class='fa fa-picture-o'></i>";
            break;                                   
        default:
           echo "<i class='fa fa-pencil'></i>";
    }

	$byline = sprintf(
		esc_html_x( 'By: %s', 'post author', 'eleos' ),
		'<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
	);

    echo '<span class="separator">|</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'eleos_excerpt_length' ) ) :
/**** Change length of the excerpt ****/
function eleos_excerpt_length() {
      global $eleos_option;
      if(isset($eleos_option['blog_excerpt'])){
        $limit = $eleos_option['blog_excerpt'];
      }else{
        $limit = 15;
      }  
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
      return $excerpt;
}
endif;

if ( ! function_exists( 'eleos_excerpt' ) ) :
/** Excerpt Section Blog Post **/
function eleos_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
endif;

if ( ! function_exists( 'eleos_tag_cloud_widget' ) ) :
/**custom function tag widgets**/
function eleos_tag_cloud_widget($args) {
    $args['number'] = 0; //adding a 0 will display all tags
    $args['largest'] = 18; //largest tag
    $args['smallest'] = 11; //smallest tag
    $args['unit'] = 'px'; //tag font unit
    $args['format'] = 'list'; //ul with a class of wp-tag-cloud
    $args['exclude'] = ''; //exclude tags by ID
    return $args;
}
add_filter( 'widget_tag_cloud_args', 'eleos_tag_cloud_widget' );
endif;

if ( ! function_exists( 'eleos_breadcrumbs' ) ) :
function eleos_breadcrumbs() {
    $text['home']     = esc_html__('Home', 'eleos'); // text for the 'Home' link
    $text['category'] = '%s'; // text for a category page
    $text['tax']      = '%s'; // text for a taxonomy page
    $text['search']   = '%s'; // text for a search results page
    $text['tag']      = '%s'; // text for a tag page
    $text['author']   = '%s'; // text for an author page
    $text['404']      = '404'; // text for the 404 page
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter   = ''; // delimiter between crumbs
    $before      = '<li class="active">'; // tag before the current crumb
    $after       = '</li>'; // tag after the current crumb
    
    global $post;
    $homeLink = esc_url(home_url('/')) . '';
    $linkBefore = '<li>';
    $linkAfter = '</li>';
    $linkAttr = ' rel="v:url" property="v:title"';
    $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
 
    if (is_home() || is_front_page()) {
 
        if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $text['home'] . '</a></div>';
 
    } else {
 
        echo '<ul class="crumb">' . sprintf($link, $homeLink, $text['home']) . $delimiter;
 
        
        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo htmlspecialchars_decode( $cats );
            }
            echo htmlspecialchars_decode( $before ) . sprintf($text['category'], single_cat_title('', false)) . htmlspecialchars_decode( $after );
 
        } elseif( is_tax() ){
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo htmlspecialchars_decode( $cats );
            }
            echo htmlspecialchars_decode( $before ) . sprintf($text['tax'], single_cat_title('', false)) . htmlspecialchars_decode( $after );
        
        }elseif ( is_search() ) {
            echo htmlspecialchars_decode( $before ) . sprintf($text['search'], get_search_query()) . htmlspecialchars_decode( $after );
 
        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo htmlspecialchars_decode( $before ) . get_the_time('d') . htmlspecialchars_decode( $after );
 
        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo htmlspecialchars_decode( $before ) . get_the_time('F') . htmlspecialchars_decode( $after );
 
        } elseif ( is_year() ) {
            echo htmlspecialchars_decode( $before ) . get_the_time('Y') . htmlspecialchars_decode( $after );
 
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;                
                if ( get_post_type() == 'portfolio' ) {
                    printf($link, $homeLink . '' . $slug['slug'] . '/', 'Portfolio'); //Translate breadcrumb.
                }else{
                    printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                }
                if ($showCurrent == 1) echo htmlspecialchars_decode( $delimiter ) . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo htmlspecialchars_decode( $cats );
                if ($showCurrent == 1) echo htmlspecialchars_decode( $before ) . get_the_title() . $after;
            }
 
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo htmlspecialchars_decode( $before ) . $post_type->labels->singular_name . htmlspecialchars_decode( $after );
 
        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
            $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
            echo htmlspecialchars_decode( $cats );
            printf($link, get_permalink($parent), $parent->post_title);
            if ($showCurrent == 1) echo htmlspecialchars_decode( $delimiter ) . $before . get_the_title() . $after;
 
        } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo htmlspecialchars_decode( $before ) . get_the_title() . $after;
 
        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo htmlspecialchars_decode( $breadcrumbs[$i] );
                if ($i != count($breadcrumbs)-1) echo htmlspecialchars_decode( $delimiter );
            }
            if ($showCurrent == 1) echo htmlspecialchars_decode( $delimiter ) . $before . get_the_title() . $after;
 
        } elseif ( is_tag() ) {
            echo htmlspecialchars_decode( $before ) . sprintf($text['tag'], single_tag_title('', false)) . $after;
 
        } elseif ( is_author() ) {
             global $author;
            $userdata = get_userdata($author);
            echo htmlspecialchars_decode( $before ) . sprintf($text['author'], $userdata->display_name) . $after;
 
        } elseif ( is_404() ) {
            echo htmlspecialchars_decode( $before ) . $text['404'] . $after;
        }
 
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() );
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
 
        echo '</ul>';
 
    }
}
endif;

if ( ! function_exists( 'eleos_pagination' ) ) :
//pagination
function eleos_pagination($prev = '<div class="link-project-block left">prev</div>', $next = '<div class="link-project-block right">next</div>', $pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
        'base'          => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
        'format'        => '',
        'current'       => max( 1, get_query_var('paged') ),
        'total'         => $pages,
        'prev_text' => $prev,
        'next_text' => $next,       
        'type'          => 'list',
        'end_size'      => 3,
        'mid_size'      => 3
);
    $return =  paginate_links( $pagination );
    echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $return );
}
endif;

if ( ! function_exists( 'eleos_custom_wp_admin_style' ) ) :
function eleos_custom_wp_admin_style() {

        wp_register_style( 'eleos_custom_wp_admin_css', get_template_directory_uri() . '/framework/admin/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'eleos_custom_wp_admin_css' );

        wp_enqueue_script( 'eleos-backend-js', get_template_directory_uri()."/framework/admin/admin-script.js", array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'eleos-backend-js' );
}
add_action( 'admin_enqueue_scripts', 'eleos_custom_wp_admin_style' );
endif;

if ( ! function_exists( 'eleos_search_form' ) ) :
/* Custom form search */
function eleos_search_form( $form ) {
    $form = '<form role="search" method="get" action="' . esc_url(home_url( '/' )) . '" >  
                <input type="search" id="search" class="form-control framed" value="' . get_search_query() . '" name="s" placeholder="'.esc_html__('To search type and hit enter', 'eleos').'" />
            </form>';
    return $form;
}
add_filter( 'get_search_form', 'eleos_search_form' );
endif;

if ( ! function_exists( 'eleos_custom_logo' ) ) :
/**
 * Prints HTML with Custom Logo.
 */
function eleos_custom_logo() {
    global $eleos_option;
    if ($eleos_option['logo']['url'] !='') {
       echo '<div class="logo"><a href="'.esc_url( home_url( '/' ) ).'"><img src="'.esc_url($eleos_option['logo']['url']).'" alt="'.get_bloginfo( 'name' ).'"></a></div>'."\n"; 
    }else{
        echo '<div class="logo"><a href="'.esc_url( home_url( '/' ) ).'"><img src="'.esc_url(get_template_directory_uri()).'/images/logo.png" alt="'.get_bloginfo( 'name' ).'"></a></div>'."\n"; 
    }
}
endif;

if ( ! function_exists( 'eleos_custom_favicon' ) ) :
/**
 * Prints HTML with Custom Favicon.
 */
function eleos_custom_favicon() {
    global $eleos_option;
    
    if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {        
        if($eleos_option['favicon']['url'] !=''){ 
            echo '<link rel="shortcut icon" href="'.($eleos_option['favicon']['url']).'">';    
         } 
         if($eleos_option['favicon']['url'] !=''){ 
            echo "\n\t".'<link rel="apple-touch-icon" href="'.($eleos_option['apple_icon']['url']).'">';    
         } 
         if($eleos_option['favicon']['url'] !=''){ 
            echo "\n\t".'<link rel="apple-touch-icon" sizes="72x72" href="'.($eleos_option['apple_icon_72']['url']).'">';    
         } 
         if($eleos_option['favicon']['url'] !=''){ 
            echo "\n\t".'<link rel="apple-touch-icon" sizes="114x114" href="'.($eleos_option['apple_icon_114']['url']).'">';    
         } 
    } 
}
endif;

if ( ! function_exists( 'eleos_custom_preload' ) ) :
/**
 * Prints HTML with Custom Preload.
 */
function eleos_custom_preload() {
    global $eleos_option;
    if($eleos_option['show_pre'] != 'no') { 
        echo '<div id="royal_preloader"></div>'."\n";
    }
}
endif;


if ( ! function_exists( 'eleos_custom_footer_text' ) ) :
/**
 * Prints HTML with Custom Footer Text.
 */
function eleos_custom_footer_text() {
    global $eleos_option;
    echo wp_kses($eleos_option['footer_text'] , wp_kses_allowed_html('post') );
}
endif;

if ( ! function_exists( 'eleos_custom_social_network' ) ) :
/**
 * Prints HTML with Custom Social Network.
 */
function eleos_custom_social_network() {
    global $eleos_option;
?>
    <ul class="footer-social">
        <?php if($eleos_option['facebook']!=''){ ?>
            <li class="icon-footer tipped" data-title="facebook"  data-tipper-options='{"direction":"top","follow":"true"}'>
                <a class="social-icon" target="_blank" href="<?php echo esc_url($eleos_option['facebook']); ?>"><i class="icons facebook fa fa-facebook"></i></a>
            </li>
        <?php } ?> 
        <?php if($eleos_option['twitter']!=''){ ?>
            <li class="icon-footer tipped" data-title="twitter"  data-tipper-options='{"direction":"top","follow":"true"}'>
                <a class="social-icon" target="_blank" href="<?php echo esc_url($eleos_option['twitter']); ?>"><i class="icons twitter fa fa-twitter"></i></a>
            </li>
        <?php } ?>
        <?php if($eleos_option['dribbble']!=''){ ?>
            <li class="icon-footer tipped" data-title="dribbble"  data-tipper-options='{"direction":"top","follow":"true"}'>
                <a class="social-icon" target="_blank" href="<?php echo esc_url($eleos_option['dribbble']); ?>"><i class="icons dribbble fa fa-dribbble"></i></a>
            </li>
        <?php } ?>            
        <?php if($eleos_option['linkedin']!=''){ ?>
            <li class="icon-footer tipped" data-title="linkedin"  data-tipper-options='{"direction":"top","follow":"true"}'>
                <a class="social-icon" target="_blank" href="<?php echo esc_url($eleos_option['linkedin']); ?>"><i class="icons linkedin fa fa-linkedin"></i></a>
            </li>
        <?php } ?>  
        <?php if($eleos_option['vimeo']!=''){ ?>
            <li class="icon-footer tipped" data-title="vimeo"  data-tipper-options='{"direction":"top","follow":"true"}'>
                <a class="social-icon" target="_blank" href="<?php echo esc_url($eleos_option['vimeo']); ?>"><i class="icons vimeo fa fa-vimeo"></i></a>
            </li>
        <?php } ?>
        
        <?php if($eleos_option['google']!=''){ ?>
            <li class="icon-footer tipped" data-title="google"  data-tipper-options='{"direction":"top","follow":"true"}'>
                <a class="social-icon" target="_blank" href="<?php echo esc_url($eleos_option['google']); ?>"><i class="icons fa fa-google"></i></a>
            </li>
        <?php } ?>
        
        <?php if($eleos_option['youtube']!=''){ ?>
            <li class="icon-footer tipped" data-title="youtube"  data-tipper-options='{"direction":"top","follow":"true"}'>
                <a class="social-icon" target="_blank" href="<?php echo esc_url($eleos_option['youtube']); ?>"><i class="icons fa fa-youtube"></i></a>
            </li>
        <?php } ?>
        
        <?php if($eleos_option['pinterest']!=''){ ?>
            <li class="icon-footer tipped" data-title="pinterest"  data-tipper-options='{"direction":"top","follow":"true"}'>
                <a class="social-icon" target="_blank" href="<?php echo esc_url($eleos_option['pinterest']); ?>"><i class="icons fa fa-pinterest"></i></a>
            </li>
        <?php } ?>
        
        <?php if($eleos_option['instagram']!=''){ ?>
            <li class="icon-footer tipped" data-title="instagram"  data-tipper-options='{"direction":"top","follow":"true"}'>
                <a class="social-icon" target="_blank" href="<?php echo esc_url($eleos_option['instagram']); ?>"><i class="icons fa fa-instagram"></i></a>
            </li>
        <?php } ?>
        
        <?php if($eleos_option['skype']!=''){ ?>
            <li class="icon-footer tipped" data-title="skype"  data-tipper-options='{"direction":"top","follow":"true"}'>
                <a class="social-icon" target="_blank" href="<?php echo esc_url($eleos_option['skype']); ?>"><i class="icons fa fa-skype"></i></a>
            </li>
        <?php } ?>
        
        <?php if($eleos_option['github']!=''){ ?>
            <li class="icon-footer tipped" data-title="github"  data-tipper-options='{"direction":"top","follow":"true"}'>
                <a class="social-icon" target="_blank" href="<?php echo esc_url($eleos_option['github']); ?>"><i class="icons fa fa-github"></i></a>
            </li>
        <?php } ?>
        
        <?php if($eleos_option['tumblr']!=''){ ?>
            <li class="icon-footer tipped" data-title="tumblr"  data-tipper-options='{"direction":"top","follow":"true"}'>
                <a class="social-icon" target="_blank" href="<?php echo esc_url($eleos_option['tumblr']); ?>"><i class="icons fa fa-tumblr"></i></a>
            </li>
        <?php } ?>
        
        <?php if($eleos_option['soundcloud']!=''){ ?>
            <li class="icon-footer tipped" data-title="soundcloud"  data-tipper-options='{"direction":"top","follow":"true"}'>
                <a class="social-icon" target="_blank" href="<?php echo esc_url($eleos_option['soundcloud']); ?>"><i class="icons fa fa-soundcloud"></i></a>
            </li>
        <?php } ?>
        
        <?php if($eleos_option['behance']!=''){ ?>
            <li class="icon-footer tipped" data-title="behance"  data-tipper-options='{"direction":"top","follow":"true"}'>
                <a class="social-icon" target="_blank" href="<?php echo esc_url($eleos_option['behance']); ?>"><i class="icons fa fa-behance"></i></a>
            </li>
        <?php } ?>
        
        <?php if($eleos_option['lastfm']!=''){ ?>
            <li class="icon-footer tipped" data-title="lastfm"  data-tipper-options='{"direction":"top","follow":"true"}'>
                <a class="social-icon" target="_blank" href="<?php echo esc_url($eleos_option['lastfm']); ?>"><i class="icons fa fa-lastfm"></i></a>
            </li>
        <?php } ?>
        
        <?php if($eleos_option['vk']!=''){ ?>
            <li class="icon-footer tipped" data-title="vk"  data-tipper-options='{"direction":"top","follow":"true"}'>
                <a class="social-icon" target="_blank" href="<?php echo esc_url($eleos_option['vk']); ?>"><i class="icons fa fa-vk"></i></a>
            </li>
        <?php } ?>
    </ul> 
<?php
}
endif;