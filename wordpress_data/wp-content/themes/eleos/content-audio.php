<?php if (is_single()) { ?> 
    <div class="post background-color-white">
    <?php if( function_exists( 'rwmb_meta' ) ) { ?>
        <?php $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true); ?>
        <?php if($link_audio){ ?>  
            <iframe width="100%" height="166" scrolling="no" frameborder="no" src="<?php echo esc_url( $link_audio ); ?>&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
        <?php } ?>
    <?php } ?>
    <div class="subtext"><?php the_time( get_option( 'date_format' ) ); ?> <?php if(has_tag()) { ?> <?php esc_html_e('in ', 'eleos'); ?> <?php the_tags( ' ', ', ' ); ?> <?php } ?> <?php esc_html_e('by ', 'eleos'); ?><?php the_author_posts_link(); ?></div>
        <h3><?php the_title(); ?></h3>
        <?php the_content(); ?>
    </div>
<?php } else { ?>
<div class="four columns" data-scroll-reveal="enter bottom move 100px over 1s after 0.1s">
<div class="post background-color-white">
    <div class="tipe"><?php esc_html_e('audio', 'eleos'); ?></div>
    <?php if( function_exists( 'rwmb_meta' ) ) { ?>
        <?php $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true); ?>
        <?php if($link_audio){ ?>  
            <iframe width="100%" height="166" scrolling="no" frameborder="no" src="<?php echo esc_url( $link_audio ); ?>&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
        <?php } ?>
    <?php } ?>
    <div class="subtext"><?php the_time( get_option( 'date_format' ) ); ?> <?php esc_html_e('in ', 'eleos'); ?> <?php if(has_tag()) { ?> <?php the_tags( ' ', ', ' ); ?> <?php } ?><?php esc_html_e('by ', 'eleos'); ?><?php the_author_posts_link(); ?></div>
    <a href="<?php esc_url(the_permalink()); ?>"><h6><?php the_title(); ?></h6> </a> 
    <p><?php echo eleos_excerpt_length(); ?></p> 
    <a href="<?php esc_url(the_permalink()); ?>"><div class="arrow-right-post"></div> </a>    
</div>
</div>
<?php } ?>