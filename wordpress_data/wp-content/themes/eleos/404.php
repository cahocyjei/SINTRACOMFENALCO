<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package eleos
 */

get_header('other'); ?>

<div class="section page-404">		
	<div class="hero-top">
		<div class="container">		
			<div class="twelve columns">
				<div class="error-page">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'eleos' ); ?></h1>
					<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'eleos' ); ?></p>
					</div><!-- .page-content -->
				</div>
				<a class="button-effect button--moema button--text-thick button--text-upper button--size-s" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('back to home','eleos') ?></a>
			</div>
		</div>
	</div>		
</div>
<?php get_footer(); ?>
