<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package fabthemes
 * @since fabthemes 1.0
 */

get_header(); ?>

		<section id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>
			<header class="page-header grid_12">
				<h1 class="page-title">
						 <?php echo get_the_term_list( $post->ID, 'department', 'Department: ', ', ', '' ); ?> 					</h1>
			</header><!-- .page-header -->
			<div class="clear"></div>
			<div class="product-shelf cf">

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
	
				<div class="product-box grid_3">
					<div class="prod-title"><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></div>
					<div class="prod-thumb">
						<?php
							$thumb = get_post_thumbnail_id();
							$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
							$image = aq_resize( $img_url, 180, 200, false ); //resize & crop the image
						?>
						<?php if($image) : ?> <a href="<?php the_permalink(); ?>"><img src="<?php echo $image ?>"/></a> <?php endif; ?>
					</div>
					
					<div class="prod-info">
						<p><?php echo get_post_meta($post->ID,'_product_info_product_description', true); ?></p>
						
						<div class="pricebar"> 
						  	<?php echo get_post_meta($post->ID,'_product_info_product_price', true); ?>
						</div>
								
						<div class="prod-footer">
							<a class="vmore" href="<?php the_permalink(); ?>">View more</a>
							
						</div>
					</div>
				</div>


				<?php endwhile; ?>
			</div>
			
			<div class="grid_12">
				<div class="paginate cf ">
					<?php kriesi_pagination(); ?>
				</div>
			</div>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area -->


<?php get_footer(); ?>