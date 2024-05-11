<?php if (is_single()) { ?> 
    <div class="post background-color-white">
    
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
    <div class="subtext"><?php the_time( get_option( 'date_format' ) ); ?> <?php if(has_tag()) { ?> <?php esc_html_e('in ', 'eleos'); ?> <?php the_tags( ' ', ', ' ); ?> <?php } ?> <?php esc_html_e('by ', 'eleos'); ?><?php the_author_posts_link(); ?></div>
      <h3><?php the_title(); ?></h3>
      <?php the_content(); ?>
    </div>
<?php } else { ?>
<div class="four columns" data-scroll-reveal="enter bottom move 100px over 1s after 0.1s">
<div class="post background-color-white">
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
    <div class="subtext"><?php the_time( get_option( 'date_format' ) ); ?> <?php esc_html_e('in ', 'eleos'); ?> <?php if(has_tag()) { ?> <?php the_tags( ' ', ', ' ); ?> <?php } ?> <?php esc_html_e('by ', 'eleos'); ?><?php the_author_posts_link(); ?></div>
    <a href="<?php esc_url(the_permalink()); ?>"><h6><?php the_title(); ?></h6> </a> 
    <p><?php echo eleos_excerpt_length(); ?></p> 
    <a href="<?php esc_url(the_permalink()); ?>"><div class="arrow-right-post"></div> </a>    
</div>
</div>
<?php } ?>
