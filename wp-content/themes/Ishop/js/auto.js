jQuery(document).ready(function() {
    var max_height = 0;
    jQuery('#main .prod-title > h2').each(function(){
        var height = jQuery(this).height();
        if (height > max_height) {
            max_height = height
        }
    })
    jQuery('#main .prod-title > h2').css('min-height', max_height);
});
