<?php
/**

   Template name: Homepage
   
 *
 * @package fabthemes
 * @since fabthemes 1.0
 */

get_header(); ?>

<div class="grid_12 cf">
	<div id="home-slider">
				<ul class="slides">
				
					<?php global $post;
					$count = ft_of_get_option('fabthemes_slide_number');
//					$slidecat =ft_of_get_option('fabthemes_slide_categories');
                    $slidecat = '';
					$args = array( 'post_type'=>'products','numberposts' => $count, 'cat' => $slidecat );
					$myposts = get_posts( $args );
					foreach( $myposts as $post ) :	setup_postdata($post); ?>
								
					<li>
					
					<div class="bxcaption">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="slide-meta"><?php echo get_the_term_list( $post->ID, 'department', 'Department: ', ', ', '' ); ?> </div>
						
						<div class="slide-content">
							<p><?php echo get_post_meta($post->ID,'_product_info_product_description', true); ?></p>
						</div>
						
						<div class="slide-price">
							<?php echo get_post_meta($post->ID,'_product_info_product_price', true); ?>
						</div>
						
						<div class="slide-link"> 
							<a href="<?php the_permalink(); ?>">Подробнее</a>
						</div>
					</div>
					
					<div class="bximage">	
					<?php
						$thumb = get_post_thumbnail_id();
						$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
						$image = aq_resize( $img_url, 500, 340, false ); //resize & crop the image
					?>
				
					<?php if($image) : ?>
						<a href="#"> <img src="<?php echo $image ?>"/> </a>
					<?php endif; ?>		
					</div>
	

					</li>
					<?php endforeach; ?>
				</ul>
		</div>

</div>
<div class="clear"></div>

<div class="section-head grid_12"> <h3>Последние товары </h3></div>
<div class="clear"></div>

<div class="product-shelf cf">



	<?php
				
		if ( get_query_var('paged') )
		    $paged = get_query_var('paged');
		elseif ( get_query_var('page') )
		    $paged = get_query_var('page');
		else
		    $paged = 1;
		$wp_query = new WP_Query(array('post_type' => 'products', 'paged' => $paged ));
		?>
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		
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
						<a class="vmore" href="<?php the_permalink(); ?>">Подробнее</a>
						
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


<?php get_footer(); ?>