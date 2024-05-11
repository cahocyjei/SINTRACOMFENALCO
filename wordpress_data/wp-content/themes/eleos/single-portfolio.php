<?php get_header('other'); ?>
    <?php while (have_posts()) : the_post()?>
		<?php the_content(); ?>
	<?php endwhile; ?>	
	<div class="section padding-top-big-bottom background-color-grey" style="padding-top:0;">
	<div class="container">
	    <div class="twelve columns" data-scroll-reveal="enter bottom move 100px over 1s after 0.1s">
            <div class="project-links">          
                <?php $prev_post = get_adjacent_post(false, '', true); $next_post = get_adjacent_post(false, '', false); ?>
                <?php if($prev_post) { ?><a href="<?php echo get_permalink($prev_post->ID); ?>"><div class="link-project-block left"> <?php esc_html_e('prev', 'eleos'); ?> </div> </a><?php } ?>
                <?php if($next_post) { ?><a href="<?php echo get_permalink($next_post->ID); ?>"><div class="link-project-block right"> <?php esc_html_e('next', 'eleos'); ?> </div> </a><?php } ?>
            </div>
        </div>
    </div>
    </div>
<?php get_footer(); ?>