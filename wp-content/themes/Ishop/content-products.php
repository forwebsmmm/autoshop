<?php
/**
 * @package fabthemes
 * @since fabthemes 1.0
 */
?>

<div class="product-shot grid_5">
		<?php
			$thumb = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
			$image = aq_resize( $img_url, 320, 400, false ); //resize & crop the image
		?>
		<?php if($image) : ?> <a class="fancybox" href="<?php echo $img_url ?>"><img class="pshot" src="<?php echo $image ?>"/></a> <?php endif; ?>
</div>


<article id="post-<?php the_ID(); ?>" <?php post_class('grid_7'); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'fabthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		
		<div class="entry-meta">
			<?php echo get_the_term_list( $post->ID, 'department', 'Department: ', ', ', '' ); ?>
		</div><!-- .entry-meta -->
		
	</header><!-- .entry-header -->

	<div class="entry-content">
        <?php $ostatok = get_post_meta( $post->ID, '_product_info_product_ostatok'); ?>
        <p class="ostatok">Осталось: <?php echo $ostatok[0] ? $ostatok[0] : 0;?> шт.</p>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'fabthemes' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'fabthemes' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
