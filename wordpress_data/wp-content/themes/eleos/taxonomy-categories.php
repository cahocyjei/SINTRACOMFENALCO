<?php get_header('other'); ?>

<div class="section padding-top-big-bottom background-color-grey">  
    <div class="container"> 
      <div class="twelve columns" data-scroll-reveal="enter bottom move 100px over 1s after 0.1s">
          <div class="section-title">
              <h2><?php esc_html_e('taxonomy-categories','eleos'); ?></h2>
          </div>
      </div>

      <div id="projects-grid">
        <?php 
            while (have_posts()) : the_post();
            $cates = get_the_terms(get_the_ID(),'categories');
               $cate_name ='';
               $cate_slug = '';
                  foreach((array)$cates as $cate){
                 if(count($cates)>0){
                  $cate_name .= $cate->name.' ' ;
                  $cate_slug .= $cate->slug .' ';     
                 } 
               }
        ?>       
                            
        <a href="<?php the_permalink(); ?>">
        <div class="portfolio-box-1 <?php echo esc_attr($cate_name); ?>">
        <div class="mask-1"></div>
        <?php the_post_thumbnail(); ?>
        <h6><?php the_title(); ?></h6>
        <p><?php echo esc_attr($cate_name); ?></p>
        </div>
        </a>   
              
        <?php endwhile;?> 
      </div>
       
        <div class="clear"></div>
        <div class="twelve columns" data-scroll-reveal="enter bottom move 100px over 1s after 0.1s">
            <div class="project-links">
            <?php echo eleos_pagination(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
