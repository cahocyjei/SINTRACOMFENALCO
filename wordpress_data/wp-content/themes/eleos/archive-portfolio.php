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
            <h2><?php esc_html_e('archive portfolio','eleos'); ?></h2>
        </div>
    </div>
    <div id="portfolio-filter" data-scroll-reveal="enter bottom move 100px over 1s after 0.1s">       
       <ul id="filter">
            <li> <a href="#" class="current" data-filter="*" title=""> <?php esc_html_e('All','eleos'); ?></a> </li>
            <?php 
             $categories = get_terms('categories');   
             foreach( (array)$categories as $categorie){
              $cat_name = $categorie->name;
              $cat_slug = $categorie->slug;
             ?>
             <li><a href="#" data-filter=".<?php echo esc_attr($cat_slug); ?>"><?php echo esc_attr($cat_name); ?></a></li>
            <?php } ?>
        </ul>
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
    <!-- content close -->

<?php get_footer(); ?>

