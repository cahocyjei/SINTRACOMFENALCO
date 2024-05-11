<?php if (is_single()) { ?> 
    <div class="post background-color-white">
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
    <div class="subtext"><?php the_time( get_option( 'date_format' ) ); ?> <?php if(has_tag()) { ?> <?php esc_html_e('in ', 'eleos'); ?> <?php the_tags( ' ', ', ' ); ?> <?php } ?> <?php esc_html_e('by ', 'eleos'); ?><?php the_author_posts_link(); ?></div>
        <h3><?php the_title(); ?></h3>
        <?php the_content(); ?>
    </div>
<?php } else { ?>
<div class="four columns" data-scroll-reveal="enter bottom move 100px over 1s after 0.1s">
<div class="post background-color-white">
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
    <div class="subtext"><?php the_time( get_option( 'date_format' ) ); ?> <?php if(has_tag()) { ?> <?php esc_html_e('in ', 'eleos'); ?> <?php the_tags( ' ', ', ' ); ?> <?php } ?> <?php esc_html_e('by ', 'eleos'); ?><?php the_author_posts_link(); ?></div>
    <a href="<?php esc_url(the_permalink()); ?>"><h6><?php the_title(); ?></h6> </a> 
    <p><?php echo eleos_excerpt_length(); ?></p> 
    <a href="<?php esc_url(the_permalink()); ?>"><div class="arrow-right-post"></div> </a>    
</div>
</div>
<?php } ?>
