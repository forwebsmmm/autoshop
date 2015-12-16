<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package fabthemes
 * @since fabthemes 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'fabthemes' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link href='http://fonts.googleapis.com/css?family=Lato:400,300,700,900' rel='stylesheet' type='text/css'>
<link href='<?php echo get_template_directory_uri(); ?>/css/jcarousel.data-attributes.css' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.jcarousel.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/auto.js" type="text/javascript"></script>

<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/autoicon.png" type="image/png">

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">


	<header id="masthead" class="site-header cf" role="banner">
		<div class="site-name ">
			
	<?php if (get_theme_mod(FT_scope::tool()->optionsName . '_logo', '') != '') { ?>
				<h1 class="site-title logo"><a class="mylogo" rel="home" href="<?php bloginfo('siteurl');?>/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img relWidth="<?php echo intval(get_theme_mod(FT_scope::tool()->optionsName . '_maxWidth', 0)); ?>" relHeight="<?php echo intval(get_theme_mod(FT_scope::tool()->optionsName . '_maxHeight', 0)); ?>" id="ft_logo" src="<?php echo get_theme_mod(FT_scope::tool()->optionsName . '_logo', ''); ?>" alt="" /></a></h1>
	<?php } else { ?>
				<h1 class="site-title logo"><a id="blogname" rel="home" href="<?php bloginfo('siteurl');?>/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	<?php } ?>

			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>
		
		<div class="contact-info">
			<span class="smail">E-mail:  <?php echo ft_of_get_option('fabthemes_mail'); ?> </span>
			<span class="sphone">Телефон: <?php echo ft_of_get_option('fabthemes_phone'); ?></span>
		</div>
	</header><!-- #masthead .site-header -->
	
	<div class="main_nav cf">
		<div class="container_12">
			<?php wp_nav_menu( array( 'container_id' => 'submenu', 'theme_location' => 'primary','menu_id'=>'fabthemes' ,'menu_class'=>'sfmenu','walker' => new description_walker() ) ); ?>
		</div>
	</div>
	
	<div class="sub_nav">
		<div class="mycart"><?php echo do_shortcode('[shopping_cart empty_msg="Ваша корзина пуста"]'); ?></div>
		<div class="sbox">
			<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
			    <div>
			        <input type="text" value="Найти запчасти" onfocus="if (this.value == 'Найти запчасти') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Найти запчасти';}" name="s" id="s" />
			        <input type="submit" id="searchsubmit" value="Поиск" />
			        <input type="hidden" name="post_type" value="products" />
			    </div>
			</form>
		</div>
	</div>
	<div id="main" class="site-main cf">
	<div class="container_12">
		