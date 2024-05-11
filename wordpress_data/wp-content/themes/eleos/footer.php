<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eleos
 */ 
?>
<div class="section padding-top-bottom-mid background-color-dark logo-footer-background">               
    <div class="container">
        <div class="twelve columns">
            <div class="footer">
                <?php eleos_custom_social_network(); ?>                  
            </div>
        </div>
    </div>  
</div>
<div class="section background-color-black">                
    <div class="container"> 
        <div class="twelve columns">
            <div class="footer-down">
                <?php eleos_custom_footer_text(); ?>
            </div>
        </div>
    </div>  
</div>
<div class="scroll-to-top"><i class="icons vimeo fa fa-angle-up"></i></div>
<?php wp_footer(); ?>
</body>
</html>
