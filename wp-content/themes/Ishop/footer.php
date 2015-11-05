<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package fabthemes
 * @since fabthemes 1.0
 */
?>
</div>
	</div><!-- #main .site-main -->
	

	<footer id="colophon" class="site-footer" role="contentinfo">
	
		<div id="bottom">
		<div class="container_12 cf">
			<ul class="cf">
			<?php if ( !function_exists('dynamic_sidebar')
			        || !dynamic_sidebar("Footer") ) : ?>  
			<?php endif; ?>
			</ul>
		</div>
		</div>
	
		<div class="site-info">
		<div class="container_12">

			<div class="fcred">
				Copyright &copy; <?php echo date('Y');?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> - <?php bloginfo('description'); ?>.<br />
<?php fflink(); ?> | <a href="http://fabthemes.com/<?php echo FT_scope::tool()->themeName ?>/" ><?php echo FT_scope::tool()->themeName ?> WordPress Theme</a>
			</div>		

		</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon .site-footer -->
	
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>
