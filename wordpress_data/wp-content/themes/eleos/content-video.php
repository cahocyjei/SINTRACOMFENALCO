<?php if (is_single()) { ?> 
    <div class="post background-color-white">
        <figure class="vimeo"> 
            <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                <?php $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true); ?>
                <?php if($link_video){ ?>  
                    <a href="<?php echo esc_attr($link_video); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());; ?>" alt=""> </a>                       
                <?php } ?>
            <?php } ?> 
        </figure>
        <div class="subtext"><?php the_time( get_option( 'date_format' ) ); ?> <?php if(has_tag()) { ?> <?php esc_html_e('in ', 'eleos'); ?> <?php the_tags( ' ', ', ' ); ?> <?php } ?> <?php esc_html_e('by ', 'eleos'); ?><?php the_author_posts_link(); ?></div>
        <h3><?php the_title(); ?></h3>
        <?php the_content(); ?>
    </div>
<?php } else { ?>
<div class="four columns" data-scroll-reveal="enter bottom move 100px over 1s after 0.1s">
<div class="post background-color-white">
    <div class="tipe"><?php esc_html_e('video', 'eleos'); ?></div>
    <figure class="vimeo"> 
    <?php if( function_exists( 'rwmb_meta' ) ) { ?>
        <?php $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true); ?>
        <?php if($link_video){ ?>  
              
            <a href="<?php echo esc_attr($link_video); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());; ?>" alt=""> </a>                 
        <?php } ?>
    <?php } ?> 
    </figure>
    <div class="subtext"><?php the_time( get_option( 'date_format' ) ); ?> <?php if(has_tag()) { ?> <?php esc_html_e('in ', 'eleos'); ?> <?php the_tags( ' ', ', ' ); ?> <?php } ?> <?php esc_html_e('by ', 'eleos'); ?><?php the_author_posts_link(); ?></div>
    <a href="<?php esc_url(the_permalink()); ?>"><h6><?php the_title(); ?></h6> </a> 
    <p><?php echo eleos_excerpt_length(); ?></p> 
    <a href="<?php esc_url(the_permalink()); ?>"><div class="arrow-right-post"></div> </a>    
</div>
</div>
<?php } ?>
