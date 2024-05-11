
	<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package eleos
 */

get_header('other'); ?>
    <div class="section padding-top-big-bottom background-color-grey">  
        <div class="container"> 
        <!-- subheader begin -->
        <div class="twelve columns" data-scroll-reveal="enter bottom move 100px over 1s after 0.1s">
            <div class="section-title">
                <h2><?php printf( __( 'Search Results for: %s', 'eleos' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
            </div>
        </div>
    <?php if ( have_posts() ) : ?>    
        <?php while (have_posts()) : the_post();?>
            <?php $format = get_post_format(); ?>
            <div class="four columns" data-scroll-reveal="enter bottom move 100px over 1s after 0.1s">
                <div class="post background-color-white"> 
                    <?php if($format=='audio'){ ?>                                       
                        <div class="tipe"><?php esc_html_e('audio', 'eleos'); ?></div>
                        <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                        <?php $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true); ?>
                            <?php if($link_audio){ ?>  
                                <iframe width="100%" height="166" scrolling="no" frameborder="no" src="<?php echo esc_url( $link_audio ); ?>&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
                            <?php } ?>
                        <?php } ?>
                    <?php } elseif ($format=='video'){ ?>                        
                        <div class="tipe"><?php esc_html_e('video', 'eleos'); ?></div>
                        <figure class="vimeo"> 
                            <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                            <?php $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true); ?>
                                <?php if($link_video){ ?>                            
                                    <a href="<?php echo esc_attr($link_video); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());; ?>" alt=""> </a>                 
                                <?php } ?>
                            <?php } ?> 
                        </figure>
                    <?php } elseif ($format=='gallery'){ ?>                        
                        <div class="tipe"><?php esc_html_e('slider', 'eleos'); ?></div>
                        <div id="owl-post" class="owl-carousel owl-theme">
                        <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                        <?php $images = rwmb_meta( '_cmb_images', "type=image" ); ?>
                            <?php if($images){ ?>
                                <?php foreach ( $images as $image ) { ?>
                                    <div class="item"><img  src="<?php echo esc_url($image['full_url']); ?>" alt=""></div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        </div>
                    <?php } elseif ($format=='image'){ ?>                       
                        <div class="tipe"><?php esc_html_e('image', 'eleos'); ?></div>
                        <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                        <?php $images = rwmb_meta( '_cmb_image', "type=image" ); ?>
                        <?php if($images){ ?>              
                        <?php  foreach ( $images as $image ) {  ?>
                        <?php $img = $image['full_url']; ?>
                        <img src="<?php echo esc_url($img); ?>" alt="">
                        <?php } ?>                
                        <?php }else{
                            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                                the_post_thumbnail( 'full', array() );
                            } 
                        } ?>
                        <?php } ?>
                    <?php } elseif ($format == 'stadard'){ ?>
                        <div class="tipe"><?php esc_html_e('stadard', 'eleos'); ?></div>                
                        <div class="subtext"><?php the_time( get_option( 'date_format' ) ); ?> <?php if(has_tag()) { ?> <?php esc_html_e('in ', 'eleos'); ?> <?php the_tags(' ', ' ' ); ?> <?php } ?> <?php esc_html_e('by ', 'eleos'); ?><?php the_author_posts_link(); ?></div>
                        <a href="<?php esc_url(the_permalink()); ?>"><h6><?php the_title(); ?></h6> </a> 
                        <p><?php echo eleos_excerpt_length(); ?></p> 
                        <a href="<?php esc_url(the_permalink()); ?>"><div class="arrow-right-post"></div> </a>   
                    <?php }else{ ?> 
                        <div class="tipe"><?php esc_html_e('stadard', 'eleos'); ?></div>                    
                        <div class="subtext"><?php the_time( get_option( 'date_format' ) ); ?> <?php if(has_tag()) { ?> <?php esc_html_e('in ', 'eleos'); ?> <?php the_tags(' ', ' ' ); ?> <?php } ?> <?php esc_html_e('by ', 'eleos'); ?><?php the_author_posts_link(); ?></div>
                        <a href="<?php esc_url(the_permalink()); ?>"><h6><?php the_title(); ?></h6> </a> 
                        <p><?php echo eleos_excerpt_length(); ?></p> 
                        <a href="<?php esc_url(the_permalink()); ?>"><div class="arrow-right-post"></div> </a> 
                    <?php } ?>   
                </div>
            </div>
        <?php endwhile; ?>

        <div class="clear"></div>
        <div class="twelve columns" data-scroll-reveal="enter bottom move 100px over 1s after 0.1s">
            <div class="project-links">
            <?php echo eleos_pagination(); ?>
            </div>
        </div>

        <?php
        // If no content, include the "No posts found" template.
        else : 
        ?>
            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'eleos' ); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'eleos' ); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .page-content -->
            </section><!-- .no-results -->
        <?php 
        endif;
        ?>        
    </div>
</div>
    <!-- content close -->

<?php get_footer(); ?>

