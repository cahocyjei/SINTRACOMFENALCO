<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package eleos
 */

get_header('other'); ?>
<div class="section padding-top-big-bottom background-color-grey">              
    <div class="container">    
        <div class="twelve columns" data-scroll-reveal="enter bottom move 100px over 1s after 0.1s">
            <div class="section-title">
                <h2><?php the_title(); ?></h2>  
            </div>
        </div>

	<!-- content begin -->
    <div class="eight columns">

        <section id="content">
            <?php while ( have_posts() ) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
                    <?php the_content(); ?>  
                </div>
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>
        </section>

    </div>

    <div class="four columns">
        <div class="sidebar background-color-white">                   
    	   <?php get_sidebar();?>
        </div>
    </div>
    </div>
</div>
<?php get_footer(); ?>
