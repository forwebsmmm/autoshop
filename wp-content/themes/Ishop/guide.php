<?php
function theme_guide(){
add_theme_page( 'Theme guide','Theme documentation','edit_themes', 'theme-documentation', 'fabthemes_theme_guide');
}
add_action('admin_menu', 'theme_guide');

function fabthemes_theme_guide(){
		echo '
		
<div id="welcome-panel" class="about-wrap">

	<div class="wpbadge" style="float:left; margin-right:30px; "><img src="'. get_template_directory_uri() . '/screenshot.png" width="250" height="200" /></div>

	<div class="welcome-panel-content">
	
	<h1>Welcome to '.wp_get_theme().' WordPress theme!</h1>
	
	<p class="about-text"> Ishop is a free ecommerce theme. This theme uses the cart66 lite plugin to power the ecommerce aspect of the theme. The Cart66 lite is a free WordPress plugin. The theme comes with other fewatures like, custom menu, custom post types, custom taxonomy, featured images, custom homepage, jquery content slider, theme options etc. </p>
	
	
	
		<div class="changelog ">
		<h3>Required plugins </h3>
		<p>The theme often requires few plugins to work the way it is originally intented to. You will find a notification on the admin panel prompting you to install the required plugins. Please install and activate the plugins.  </p>
		<ol>
			<li><a href="http://wordpress.org/extend/plugins/options-framework/">Options framework</a></li>
			<li><a href="http://wordpress.org/extend/plugins/cart66-lite/"> Cart66 lite</a></li>
		</ol>
		</div>
	
		<div class="changelog ">
		<h3>Ecommerce setup </h3>
		<p> The theme uses Cart66 plugin as the Ecommerce solution on this theme. The plugin is free to download. So install the plugin and setup the payment gateways, tax details, shipping details etc. You can reffer the <a href="http://cart66.com/cart66lite-documentation.pdf">Cart66 Documentation</a> to get a better idea about setting up the plugin and its options.  </p>
		
		<h4>Add products to inventory</h4>
		
		<p>Once the plugin is installed and your shop is configured you can start adding products to your inventory. Go to the <em><b>Admin Panel > Cart66 > Products</b></em> and add your products. </p>
		
		
		<h4>Create product post</h4>	
		
		<p>Products are managed in the theme using a custom post type called <b><em>"Products"</em></b>. Click on <b>add new</b> products and enter your product name, details, information and product image. There are 2 metaboxes below the post editor. You can enter the product price nd a small description of the product in the metabox. </p>	
		<p> You will find the Cart66 button on the top of the post editor and when you click on it you will see a popup box from which you can select the product and insert the Add to Cart button for that product.</p>
		
		<p><iframe src="http://www.screenr.com/embed/lda7" width="650" height="396" frameborder="0"></iframe></p>
		
		</div>	
	
		<div class="changelog">
		<h3> Custom homepage</h3>
		<p>The theme offers a custom homepage template. The custom homepage features a jquery content slider and latest products. To create the custom homepage 
		do the following steps.	 </p>
		
		<ul>
			<li>Create a new page called Home and select <b>Homepage</b> as the template and publish it. </li>
			<li>Go to <b>Settings > Reading > Frontpage displays > Select Static page</b> </li>
			<li>For Front page select the page you created earlier called Home.</li>
			<li>For Blog, select another page.</li>
			
		</ul>
		

		</div>	
	
	
		<div class="changelog ">
		
		<h3>Theme options explained</h3>
		<p>The theme contains an options page using which you adjust various settings available on the theme. </p>
		
		<p><b>Slider setting:</b>
		There is a jQuery slider on the homepage of the theme You can use the slider to display the featured products from a selected category. From the theme options page you can select a category and the number of items to be displayed.</p>

		<p><b>Contact info:</b>
		You can add email and phone number that can be displayed on the header.</p>

		<p><b>Banner setting:</b>
		Configure the banner ads on the sidebar </p>

		</div>
	





				
		<div class="changelog ">
		' . file_get_contents(dirname(__FILE__) . '/FT/license-html.php') . '
		</div>
	
				

	<p class="welcome-panel-dismiss">WordPress theme designed by <a href="http://www.fabthemes.com">FabThemes.com</a>.</p>

	</div>
	</div>
		
		';
		

}
