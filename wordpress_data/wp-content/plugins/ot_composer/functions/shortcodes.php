<?php 

// Custom Heading
add_shortcode('heading','heading_func');
function heading_func($atts, $content = null){
	extract(shortcode_atts(array(
		'text'		=>	'',
		'tag'		=> 	'',
		'size'		=>	'',
		'color'		=>	'',
		'align'		=>	'',	
        'top'       =>  '',	
		'bot'		=>	'',
		'class'		=>	'',
	), $atts));
	
	$size1 = (!empty($size) ? 'font-size: '.$size.'px;' : '');
	$color1 = (!empty($color) ? 'color: '.$color.';' : '');
	$align1 = (!empty($align) ? 'text-align: '.$align.';' : '');	
    $top = (!empty($top) ? 'margin-top: '.esc_attr($top).';' : '');
	$bot = (!empty($bot) ? 'margin-bottom: '.esc_attr($bot).';' : '');
	$cl = (!empty($class) ? ' class= "'.$class.'"' : '');
	ob_start(); ?>
	
	<?php echo htmlspecialchars_decode('<'. $tag . $cl .' style="' . $size1 . $align1 . $color1 . $top . $bot .'" > '. $text .'</'.$tag.'>'); ?>
	
<?php
    return ob_get_clean();
}

// Home Slider Text
add_shortcode('home_slider_text', 'home_slider_text_func');
function home_slider_text_func($atts, $content = null){
    extract(shortcode_atts(array(
        'number'    =>  '',    
        'linkbox'   =>  '',
    ), $atts));

    $url = vc_build_link( $linkbox );

    ob_start(); 
?>
    <div class="section full-height">
        <div id="owl-top" class="owl-carousel owl-theme">
            <?php 
            $i=0;
                 $args = array(   
                    'post_type' => 'slider_text',   
                    'posts_per_page' => $number,
                 );  
                 $wp_query = new WP_Query($args);
                 while ($wp_query -> have_posts()) : $wp_query -> the_post(); $i++; 
                 $text_position = get_post_meta(get_the_ID(),'_cmb_text_position', true);
             ?>
             <div class="item" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id());; ?>);">
                                
                <div class="hero-top">                          
                    <div class="container"> 
                        <div class="twelve columns">
                        
                                <?php if($text_position == 'right'){ ?>
                                    <div class="hero-text right">
                                <?php } else { ?>
                                    <div class="hero-text left">
                                <?php } ?>
                            
                                <h5><?php the_title(); ?></h5>
                                    <?php the_content(); ?>
                            </div>  
                        </div>  
                    </div>      
                </div>  
                                
            </div>            
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
            echo '<a data-gal="m_PageScroll2id" data-ps2id-offset="78" class="scroll-down-arrow" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) . '</a>';
        } ?> 
    </div>
    
<?php
    return ob_get_clean();
}

// Home Parallax
add_shortcode('home_parallax', 'home_parallax_func');
function home_parallax_func($atts, $content = null){
    extract(shortcode_atts(array(
        'title'         =>  '',    
        'titlesha'      =>  '',   
        'subtitle'      =>  '',  
        'image'         =>  '',
        'linkbox'       =>  '',
    ), $atts));

    $url = vc_build_link( $linkbox );
    $img = wp_get_attachment_image_src($image,'full');
    $img = $img[0];

    ob_start(); 
?>
    <div class="section full-height">
                
        <div class="parallax-home" <?php if($img != ''){ ?> style="background-image:url(<?php echo esc_url($img); ?>)" <?php } ?>></div>
                            
        <div class="hero-top">                          
            <div class="container"> 
                <div class="twelve columns">
                    <div class="hero-text left">
                        <h5><span><?php echo esc_attr($titlesha); ?></span><br><?php echo esc_attr($title); ?></h5>
                        <p><?php echo esc_attr($subtitle); ?></p>
                    </div>  
                </div>  
            </div>      
        </div>  
                            
        <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
            echo '<a data-gal="m_PageScroll2id" data-ps2id-offset="78" class="scroll-down-arrow" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) . '</a>';
        } ?> 
            
    </div>
    
<?php
    return ob_get_clean();
}


// Video Home
add_shortcode('videohome','videohome_func');
function videohome_func($atts, $content = null){
extract(shortcode_atts(array(
    'title'     =>  '',
    'titlesha'     =>  '',
    'subtitle'  =>  '',
    'linkvd1'   =>  '',
    'linkvd2'   =>  '',
    'linkvd3'   =>  '',
    'image'     =>  '',
    'linkbox'   =>  '',

), $atts));

    $url = vc_build_link( $linkbox );
    $img = wp_get_attachment_image_src($image,'full');
    $img = $img[0];

ob_start(); ?>
<div class="section full-height">
    <div class="hero-top">                          
        <div class="container"> 
            <div class="twelve columns">
                <div class="hero-text left">
                    <?php if($title != ''){ ?><h5><span><?php echo esc_attr($titlesha); ?></span><br><?php echo esc_attr($title); ?></h5><?php } ?>
                    <?php if($subtitle != ''){ ?><p><?php echo esc_attr($subtitle); ?></p><?php } ?>
                </div>  
            </div>  
        </div>      
    </div>
    
    <div id="poster_background" <?php if($img != ''){ ?> style="background-image:url(<?php echo esc_url($img); ?>)" <?php } ?>></div>
    <div id="video-wrap">
        <video id="video_background" preload="auto" autoplay loop="loop" muted="muted" poster="<?php echo esc_url($img); ?>"> 
            <source src="<?php echo esc_url($linkvd1); ?>" type="video/webm"> 
            <source src="<?php echo esc_url($linkvd2); ?>" type="video/mp4"> 
            <source src="<?php echo esc_url($linkvd3); ?>" type="video/ogg"> 
        </video>
    </div>  
                    
    <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
            echo '<a data-gal="m_PageScroll2id" data-ps2id-offset="78" class="scroll-down-arrow" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) . '</a>';
    } ?> 
</div>
    <?php
    return ob_get_clean();
}


// Home Youtube Video
add_shortcode('home_youtube', 'home_youtube_func');
function home_youtube_func($atts, $content = null){
    extract(shortcode_atts(array(
        'title'         =>  '',    
        'titlesha'      =>  '', 
        'subtitle'      =>  '',  
        'video_link'    =>  '', 
        'linkbox'       =>  '',
    ), $atts));
    $url = vc_build_link( $linkbox );
    ob_start(); 
?>
<div class="section full-height">
    <div class="hero-top">                          
        <div class="container"> 
            <div class="twelve columns">
                <div class="hero-text left">
                    <?php if($title != ''){ ?><h5><span><?php echo esc_attr($titlesha); ?></span><br><?php echo esc_attr($title); ?></h5><?php } ?>
                    <p><?php echo esc_attr($subtitle); ?></p>
                </div>  
            </div>  
        </div>      
    </div>
    
    <div id="video-wrap home_youtubevideo">
        <a id="bgndVideo" class="player" data-property="{videoURL:'<?php echo esc_attr( $video_link ); ?>',containment:'#home-sec',autoPlay:true, mute:true, startAt:5, opacity:1}"><?php _e('youtube', 'eleos') ?></a>
        <div id="homeYouTube" >
            <div id="home-sec"></div>
        </div>  
    </div>  
    <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
            echo '<a data-gal="m_PageScroll2id" data-ps2id-offset="78" class="scroll-down-arrow" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) . '</a>';
    } ?>                
    
</div>
 
    
<?php
    return ob_get_clean();
}

//Section title Shadow
add_shortcode('sectit', 'sectit_func');
function sectit_func($atts, $content = null){
    extract(shortcode_atts(array(
        'title'   =>  '',     
        'shtit'   =>  '',
    ), $atts));

    ob_start(); 
?>
    <div class="section-title">
        <?php if($title){ ?><h2><?php echo esc_attr($title); ?></h2>  <?php } ?>          
        <?php if($shtit){ ?><div class="shadow-title"><?php echo esc_attr($shtit) ?></div><?php } ?> 
    </div>
<?php
    return ob_get_clean();
}

//Section title
add_shortcode('sectit2', 'sectit2_func');
function sectit2_func($atts, $content = null){
    extract(shortcode_atts(array(
        'title'   =>  '',   
    ), $atts));

    ob_start(); 
?>
    <div class="section-title">
        <?php if($title){ ?><h4><?php echo esc_attr($title); ?></h4>  <?php } ?>          
    </div>
<?php
    return ob_get_clean();
}

// Agency
add_shortcode('agency', 'agency_func');
function agency_func($atts, $content = null){
    extract(shortcode_atts(array(
        'number'    =>  '',    
    ), $atts));

    ob_start(); 
?>
    <div class="about-carousel-wrap">
        <div id="sync1" class="owl-carousel">
            <?php 
                 $args = array(   
                    'post_type' => 'agency',   
                    'posts_per_page' => $number,
                 );  
                 $wp_query = new WP_Query($args);
                 while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
             ?>
             <div class="item"><?php the_content(); ?></div>
                                       
            <?php endwhile; ?>
        </div>
        <div id="sync2" class="owl-carousel">
            <?php 
            
                 $args = array(   
                    'post_type' => 'agency',   
                    'posts_per_page' => $number,
                 );  
                 $wp_query = new WP_Query($args);
                 while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
            ?>
            <div class="item"><h6><span><?php the_title(); ?></span></h6></div>
             <?php endwhile; ?>
        </div>
             <?php wp_reset_postdata(); ?>
    </div>
    
<?php
    return ob_get_clean();
}

// Our Team
add_shortcode('team', 'team_func');
function team_func($atts, $content = null){
    extract(shortcode_atts(array(
        'photo'     =>  '',
        'name'      =>  '',
        'job'       =>  '',
        'icon1'     =>  '',
        'icon2'     =>  '',
        'icon3'     =>  '',
        'icon4'     =>  '',
        'url1'      =>  '',
        'url2'      =>  '',
        'url3'      =>  '',
        'url4'      =>  '',
    ), $atts));

    $img = wp_get_attachment_image_src($photo,'full');
    $img = $img[0];

    $icon11 = (!empty($icon1) ? '<a href="'.esc_url($url1).'" class="social-icon" target="_blank"><i class="icons '.esc_attr($icon1).'"></i></a>' : '');
    $icon22 = (!empty($icon2) ? '<a href="'.esc_url($url2).'" class="social-icon" target="_blank"><i class="icons '.esc_attr($icon2).'"></i></a>' : '');
    $icon33 = (!empty($icon3) ? '<a href="'.esc_url($url3).'" class="social-icon" target="_blank"><i class="icons '.esc_attr($icon3).'"></i></a>' : '');
    $icon44 = (!empty($icon4) ? '<a href="'.esc_url($url4).'" class="social-icon" target="_blank"><i class="icons '.esc_attr($icon4).'"></i></a>' : '');

    ob_start(); ?>
    <div class="team-box-1">
        <img  src="<?php echo esc_url($img); ?>" alt="" />  
        <div class="mask"></div>
                <ul>
                    <?php if($icon1) { ?>
                    <li class="icon-team tipped" data-title="<?php echo esc_attr($icon1); ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
                        <?php echo htmlspecialchars_decode(esc_attr($icon11)); ?>
                    </li>
                    <?php } ?>
                    <?php if($icon2) { ?>
                    <li class="icon-team tipped" data-title="<?php echo esc_attr($icon2); ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
                        <?php echo htmlspecialchars_decode(esc_attr($icon22)); ?>
                    </li>
                    <?php } ?>
                    <?php if($icon3) { ?>
                    <li class="icon-team tipped" data-title="<?php echo esc_attr($icon3); ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
                        <?php echo htmlspecialchars_decode(esc_attr($icon33)); ?>
                    </li>
                    <?php } ?>
                    <?php if($icon4) { ?>
                    <li class="icon-team tipped" data-title="<?php echo esc_attr($icon4); ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
                        <?php echo htmlspecialchars_decode(esc_attr($icon44)); ?>
                    </li>
                    <?php } ?>
                </ul>
            <?php if($name){ ?><h6><?php echo htmlspecialchars_decode($name); ?></h6><?php } ?>
            <?php if($job){ ?><div class="subtext"><?php echo htmlspecialchars_decode($job); ?></div><?php } ?>    
           
    </div>
    
    <?php

    return ob_get_clean();
}

// Service
add_shortcode('service', 'service_func');
function service_func($atts, $content = null){
    extract(shortcode_atts(array(
        'number'    =>  '',    
    ), $atts));

    ob_start(); 
?>
    <div class="section sep-1-background">
        <div id="owl-sep-1" class="owl-carousel owl-theme">     
            <?php 
            $i=1;
                 $args = array(   
                    'post_type' => 'service',   
                    'posts_per_page' => $number,
                 );  
                 $wp_query = new WP_Query($args);
                 while ($wp_query -> have_posts()) : $wp_query -> the_post(); 

            $number = get_post_meta(get_the_ID(),'_cmb_number', true);
            ?>

            <?php if ($i%3==1 ) {  ?>
            <div class="item">  
                <div class="container padding-top-bottom">  
            <?php } ?>

                    <div class="four columns background-color-white-trans"> 
                        <div class="services">
                        <div class="number"><?php echo esc_attr($number); ?></div>
                        <h6><?php the_title(); ?></h6>
                        <?php the_content(); ?>
                        </div>
                    </div>

            <?php if ($i%3 == 0) { ?>
                </div>  
            </div>
            <?php } ?>

            <?php $i++; endwhile; ?>
            <?php //wp_reset_postdata(); ?>
        </div>
    </div>
    
<?php
    return ob_get_clean();
}

// Slide show
add_shortcode('slishow', 'slishow_func');
function slishow_func($atts, $content = null){
    extract(shortcode_atts(array(
        'number'    =>  '',    
    ), $atts));

    ob_start(); 
?>
    <div id="slideshow" class="slideshow"> 
		<?php 
			 $args = array(   
				'post_type' => 'slide_show',   
				'posts_per_page' => $number,
			 );  
			 $wp_query = new WP_Query($args);
			 while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
		?>
		<div class="slide">
			<h2 class="slide__title slide__title--preview"><?php esc_html_e('Project Name ', 'eleos'); ?> <span class="slide__price"><?php the_title(); ?></span></h2>
			<div class="slide__item">
				<div class="slide__inner">
					<img class="slide__img slide__img--small" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());; ?>" alt="Some image" />
					<a class="group1" href="<?php echo wp_get_attachment_url(get_post_thumbnail_id());; ?>"><div class="action action--open" aria-label="View details"><i class="fa fa-plus"></i></div></a>
				</div>
			</div>
		</div>       
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>        
    </div>
    <script type="text/javascript">
    (function($) { "use strict";
        //Work Carousel
        
        $(document).ready(function() {
            document.documentElement.className = 'js';
            var slideshow = new CircleSlideshow(document.getElementById('slideshow'));
        });
    })(jQuery);
    </script>
<?php
    return ob_get_clean();
}

// Portfolio
add_shortcode('portfolio','portfolio_func');
function portfolio_func($atts, $content = null){
    extract( shortcode_atts( array(      
      
      'all'     => '',
      
      'number'  => '',
      
   ), $atts ) );

    ob_start(); ?>

    
    <div id="portfolio-filter" data-scroll-reveal="enter bottom move 100px over 1s after 0.1s">       
       <ul id="filter">
            <li> <a href="#" class="current" data-filter="*" title=""> <?php echo esc_attr($all); ?></a> </li>
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
            $number1 = (!empty($number)) ? $number : 9;
            $args = array(   
                'post_type' => 'portfolio',
                'posts_per_page' => $number1,   

            );  
            $wp_query = new WP_Query($args);    
            if($wp_query->have_posts()):        
            while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
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

        <?php wp_reset_postdata(); ?>
        <?php endif; ?>         
    
<?php
    return ob_get_clean();
}

//Testimonial slider
add_shortcode('testislider','testislider_func');
function testislider_func($atts, $content = null){
    extract( shortcode_atts( array(
      'number'    => '',
   ), $atts ) );
    ob_start(); ?>
    <div id="owl-sep-2" class="owl-carousel owl-theme"> 
      <?php 
         $args = array(   
            'post_type' => 'testimonial',
            'posts_per_page' => $number,
         );  
         $wp_query = new WP_Query($args);
         while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
     ?>

      <div class="item">                                                            
        <div class="container padding-top-bottom">  
            <div class="twelve columns background-color-white-trans">   
                <div class="quote"> 
                    <div class="quotes-1"><i class="icons vimeo fa fa-quote-right"></i></div>
                    <div class="quotes-2"><i class="icons vimeo fa fa-quote-left"></i></div>
                    <p><?php the_content(); ?><p>
                    <h6><?php the_title(); ?></h6>
                </div>  
            </div>  
        </div>                                          
    </div>      
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </div>
<?php return ob_get_clean();

}

// Our Fact
add_shortcode('fact', 'fact_func');
function fact_func($atts, $content = null){
    extract(shortcode_atts(array(
        'title'     =>  '',
        'icon'      =>  '',
        'number'    =>  '',
    ), $atts));

    ob_start(); ?>
    <div class="counters background-color-white-trans">             
        <div class="coun-num"><span class="counter-jquery-start"><?php echo esc_attr($number); ?></span></div>
        <h6><span><i class="<?php echo esc_attr($icon); ?>"></i></span> <?php echo esc_attr($title) ?></h6>
        <p><?php echo htmlspecialchars_decode($content); ?></p>
    </div>

<?php
    return ob_get_clean();
}

// Logo Clients
add_shortcode('clients','clients_func');
function clients_func($atts, $content = null){
extract(shortcode_atts(array(
    'gallery'   =>  '',

), $atts));

ob_start(); ?>
            <div id="owl-logo" class="owl-carousel owl-theme">  
           
            <?php 
                $img_ids = explode(",",$gallery);
                foreach( $img_ids AS $img_id ){
                $meta = wp_prepare_attachment_for_js($img_id);
                $caption = $meta['caption'];
                $title = $meta['title'];    
                $description = $meta['description'];
                $image_src = wp_get_attachment_image_src($img_id,''); 
            ?>
                <div class="item"><img src="<?php echo esc_url($image_src[0]); ?>" alt=""></div>
            <?php } ?>  
            </div>

    <?php
    return ob_get_clean();
}

// Contact Info

add_shortcode('ctinfo', 'ctinfo_func');
function ctinfo_func($atts, $content = null){
    extract(shortcode_atts(array(
        'icon'      =>  '',
        'title'     =>  '',
    ), $atts));

    ob_start(); ?>  
    <div class="con-details">
        <div class="icon"><i class="<?php echo esc_attr($icon); ?>"></i></div>
        <h6><?php echo esc_attr($title); ?></h6>
        <p><?php echo htmlspecialchars_decode($content); ?></p>
    </div>  
    <?php

    return ob_get_clean();
}

// Image Project

add_shortcode('imgproj', 'imgproj_func');
function imgproj_func($atts, $content = null){
    extract(shortcode_atts(array(
        'image'      =>  '',
    ), $atts));

    $img = wp_get_attachment_image_src($image,'full');
    $img = $img[0];

    ob_start(); ?>  
    <div class="full-img-wrap">
        <img src="<?php echo esc_url($img); ?>" alt="">
    </div> 
    <?php

    return ob_get_clean();
}

// Video Player
add_shortcode('video','video_func');
function video_func($atts, $content = null){
extract(shortcode_atts(array(
    'video' =>  '',
    'image' =>  '',

), $atts));

    $img = wp_get_attachment_image_src($image,'full');
    $img = $img[0];

ob_start(); ?>
    <figure class="vimeo"> 
        <a href="<?php echo esc_url($video); ?>" width="100%" height="100%">
            <img src="<?php echo esc_url($img); ?>" alt="image" />
        </a>
    </figure>

    <?php
    return ob_get_clean();
}

// Blog
add_shortcode('blog', 'blog_func');
function blog_func($atts, $content = null){
    extract(shortcode_atts(array(
        'number'    =>  '',
        'linkbox'   =>  '',
        'textsd'    =>  '',
    ), $atts));
    $url = vc_build_link( $linkbox );
    ob_start(); 

    ?>

    <div class="container">
    <?php 
        $i=0;
        $args = array(   
            'post_type' => 'post',   
            'posts_per_page' => $number,
        );  
        $wp_query = new WP_Query($args);
        while($wp_query->have_posts()) : $wp_query->the_post(); $i++;
		$format = get_post_format();
    ?>
		<div class="<?php if($i <=2 ){echo 'six';} else {echo 'four';} ?> columns" data-scroll-reveal="enter bottom move 100px over 1s after 0.1s">
			<div class="post background-color-white">
				
				<?php if($format == 'video'){?>
					<?php if($i == 1){ ?><div class="tipe"><?php esc_html_e('latest article', 'eleos'); ?></div><?php } else{ ?>
					<div class="tipe"><?php esc_html_e('video', 'eleos'); ?></div><?php } ?>
					<figure class="vimeo"> 
						<?php if( function_exists( 'rwmb_meta' ) ) { ?>
						<?php $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true); ?>
							<?php if($link_video){ ?>  			  
							<a href="<?php echo esc_attr($link_video); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());; ?>" alt="image"> </a>                 
							<?php } ?>
						<?php } ?> 
					</figure>
				<?php }elseif($format == 'audio'){ ?>
					<?php if($i == 1){ ?><div class="tipe"><?php esc_html_e('latest article', 'eleos'); ?></div><?php } else{ ?>
						<div class="tipe"><?php esc_html_e('audio', 'eleos'); ?></div>
					<?php } ?>
					<?php if( function_exists( 'rwmb_meta' ) ) { ?>
						<?php $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true); ?>
						<?php if($link_audio){ ?>  
							<iframe width="100%" height="166" scrolling="no" frameborder="no" src="<?php echo esc_url( $link_audio ); ?>&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
						<?php } ?>
					<?php } ?>
				<?php }elseif($format == 'gallery'){?>
					<?php if($i == 1){ ?><div class="tipe"><?php esc_html_e('latest article', 'eleos'); ?></div><?php } else{ ?>
						<div class="tipe"><?php esc_html_e('slider', 'eleos'); ?></div>
					<?php } ?>
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
				<?php }elseif($format == 'image'){ ?>			
					<?php if($i == 1){ ?><div class="tipe"><?php esc_html_e('latest article', 'eleos'); ?></div><?php } else{ ?>
						<div class="tipe"><?php esc_html_e('image', 'eleos'); ?></div>
					<?php } ?>
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
				<?php }else{ 
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail( 'full', array() );
						} 	
					} 
				?>	
				
				<div class="subtext"><?php the_time( get_option( 'date_format' ) ); ?> <?php if(has_tag()) { ?> <?php esc_html_e('in', 'eleos'); ?> <?php the_tags( ' ', ', ' ); ?> <?php } ?> <?php esc_html_e('by ', 'eleos'); ?><?php the_author_posts_link(); ?></div>
				<a href="<?php esc_url(the_permalink()); ?>"><h6><?php the_title(); ?></h6></a> 
				<p><?php echo eleos_excerpt_length(); ?></p> 
				<a href="<?php esc_url(the_permalink()); ?>"><div class="arrow-right-post"></div></a>
					
			</div>
		</div>
		
    <?php endwhile; ?>
	
    <?php wp_reset_postdata(); ?>
	
        <div class="twelve columns" data-scroll-reveal="enter bottom move 100px over 1s after 0.1s">
			<?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
				echo '<a href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '"><div class="post all-news-link background-color-white"><h6>' . esc_attr( $url['title'] ) . '</h6><div class="tipe">'.esc_attr($textsd).'</div></div></a>';
			} ?>
        </div>
		
    </div>
<?php 
	return ob_get_clean();
}

// Map
add_shortcode('maps','maps_func');
function maps_func($atts, $content = null){
    extract(shortcode_atts(array(       
        'imgmap'         => '', 
        'latitude'       => '',
        'longitude'      => '',
        'zoommap'        => '',
        'saturation'     => '',
        'brightness'     => '',
    ), $atts));

    $img = wp_get_attachment_image_src($imgmap,'full');
    $img = $img[0];

    ob_start(); ?>
    <div id="cd-google-map">
        <div id="google-container"></div>
        <div id="cd-zoom-in"></div>
        <div id="cd-zoom-out"></div>
        <address><?php echo htmlspecialchars_decode($content); ?></address> 
    </div>  
    <script type="text/javascript">
        
(function($) { "use strict";
    
        
    //set your google maps parameters

    jQuery(document).ready(function($){
        
        var latitude = <?php echo esc_attr($latitude); ?>,
            longitude = <?php echo esc_attr($longitude); ?>,
            map_zoom = <?php echo esc_attr($zoommap); ?>;

        //google map custom marker icon - .png fallback for IE11
        var is_internetExplorer11= navigator.userAgent.toLowerCase().indexOf('trident') > -1;
        var marker_url = ( is_internetExplorer11 ) ? '<?php echo esc_url( $img ); ?>' : '<?php echo get_template_directory_uri(); ?>/images/cd-icon-location.svg';
            
        //define the basic color of your map, plus a value for saturation and brightness
        var main_color = '#cfa144',
            saturation_value= <?php echo esc_attr($saturation); ?>,
            brightness_value= <?php echo esc_attr($brightness); ?>;

        //we define here the style of the map
        var style= [ 
            {
                //set saturation for the labels on the map
                elementType: "labels",
                stylers: [
                    {saturation: saturation_value}
                ]
            },  
            {   //poi stands for point of interest - don't show these lables on the map 
                featureType: "poi",
                elementType: "labels",
                stylers: [
                    {visibility: "off"}
                ]
            },
            {
                //don't show highways lables on the map
                featureType: 'road.highway',
                elementType: 'labels',
                stylers: [
                    {visibility: "off"}
                ]
            }, 
            {   
                //don't show local road lables on the map
                featureType: "road.local", 
                elementType: "labels.icon", 
                stylers: [
                    {visibility: "off"} 
                ] 
            },
            { 
                //don't show arterial road lables on the map
                featureType: "road.arterial", 
                elementType: "labels.icon", 
                stylers: [
                    {visibility: "off"}
                ] 
            },
            {
                //don't show road lables on the map
                featureType: "road",
                elementType: "geometry.stroke",
                stylers: [
                    {visibility: "off"}
                ]
            }, 
            //style different elements on the map
            { 
                featureType: "transit", 
                elementType: "geometry.fill", 
                stylers: [
                    { hue: main_color },
                    { visibility: "on" }, 
                    { lightness: brightness_value }, 
                    { saturation: saturation_value }
                ]
            }, 
            {
                featureType: "poi",
                elementType: "geometry.fill",
                stylers: [
                    { hue: main_color },
                    { visibility: "on" }, 
                    { lightness: brightness_value }, 
                    { saturation: saturation_value }
                ]
            },
            {
                featureType: "poi.government",
                elementType: "geometry.fill",
                stylers: [
                    { hue: main_color },
                    { visibility: "on" }, 
                    { lightness: brightness_value }, 
                    { saturation: saturation_value }
                ]
            },
            {
                featureType: "poi.sport_complex",
                elementType: "geometry.fill",
                stylers: [
                    { hue: main_color },
                    { visibility: "on" }, 
                    { lightness: brightness_value }, 
                    { saturation: saturation_value }
                ]
            },
            {
                featureType: "poi.attraction",
                elementType: "geometry.fill",
                stylers: [
                    { hue: main_color },
                    { visibility: "on" }, 
                    { lightness: brightness_value }, 
                    { saturation: saturation_value }
                ]
            },
            {
                featureType: "poi.business",
                elementType: "geometry.fill",
                stylers: [
                    { hue: main_color },
                    { visibility: "on" }, 
                    { lightness: brightness_value }, 
                    { saturation: saturation_value }
                ]
            },
            {
                featureType: "transit",
                elementType: "geometry.fill",
                stylers: [
                    { hue: main_color },
                    { visibility: "on" }, 
                    { lightness: brightness_value }, 
                    { saturation: saturation_value }
                ]
            },
            {
                featureType: "transit.station",
                elementType: "geometry.fill",
                stylers: [
                    { hue: main_color },
                    { visibility: "on" }, 
                    { lightness: brightness_value }, 
                    { saturation: saturation_value }
                ]
            },
            {
                featureType: "landscape",
                stylers: [
                    { hue: main_color },
                    { visibility: "on" }, 
                    { lightness: brightness_value }, 
                    { saturation: saturation_value }
                ]
                
            },
            {
                featureType: "road",
                elementType: "geometry.fill",
                stylers: [
                    { hue: main_color },
                    { visibility: "on" }, 
                    { lightness: brightness_value }, 
                    { saturation: saturation_value }
                ]
            },
            {
                featureType: "road.highway",
                elementType: "geometry.fill",
                stylers: [
                    { hue: main_color },
                    { visibility: "on" }, 
                    { lightness: brightness_value }, 
                    { saturation: saturation_value }
                ]
            }, 
            {
                featureType: "water",
                elementType: "geometry",
                stylers: [
                    { hue: main_color },
                    { visibility: "on" }, 
                    { lightness: brightness_value }, 
                    { saturation: saturation_value }
                ]
            }
        ];
            
        //set google map options
        var map_options = {
            center: new google.maps.LatLng(latitude, longitude),
            zoom: map_zoom,
            panControl: false,
            zoomControl: false,
            mapTypeControl: false,
            streetViewControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scrollwheel: false,
            styles: style,
        }
        //inizialize the map
        var map = new google.maps.Map(document.getElementById('google-container'), map_options);
        //add a custom marker to the map                
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(latitude, longitude),
            map: map,
            visible: true,
            icon: marker_url,
        });

        //add custom buttons for the zoom-in/zoom-out on the map
        function CustomZoomControl(controlDiv, map) {
            //grap the zoom elements from the DOM and insert them in the map 
            var controlUIzoomIn= document.getElementById('cd-zoom-in'),
                controlUIzoomOut= document.getElementById('cd-zoom-out');
            controlDiv.appendChild(controlUIzoomIn);
            controlDiv.appendChild(controlUIzoomOut);

            // Setup the click event listeners and zoom-in or out according to the clicked element
            google.maps.event.addDomListener(controlUIzoomIn, 'click', function() {
                map.setZoom(map.getZoom()+1)
            });
            google.maps.event.addDomListener(controlUIzoomOut, 'click', function() {
                map.setZoom(map.getZoom()-1)
            });
        }

        var zoomControlDiv = document.createElement('div');
        var zoomControl = new CustomZoomControl(zoomControlDiv, map);

        //insert the zoom div on the top left of the map
        map.controls[google.maps.ControlPosition.LEFT_TOP].push(zoomControlDiv);
    });      
  })(jQuery); 

    </script>

    <?php

    return ob_get_clean();

}
?>