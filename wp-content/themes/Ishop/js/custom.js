jQuery(document).ready(function() {
	
/* Navigation */

	jQuery('#submenu ul.sfmenu').superfish({ 
		delay:       500,								// 0.1 second delay on mouseout 
		animation:   { opacity:'show',height:'show'},	// fade-in and slide-down animation 
		dropShadows: true								// disable drop shadows 
	});	

/* Grid */

	jQuery('.product-shelf div.grid_3:nth-child(4n)').after('<div class="clear"></div>');

/* Banner class */

	jQuery('.squarebanner ul li:nth-child(even)').addClass('rbanner');

/* Slider */

	jQuery('.slides').bxSlider();

/* Custom select */

	jQuery('.cart66Options').customSelect({customClass:'cselect'});

/* Fancybox */

    jQuery(".fancybox").fancybox({
        openEffect: 'elastic',
        closeEffect: 'fade'
    });


});