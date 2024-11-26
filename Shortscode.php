#Function pape in Create a Shortscodes 
function custom_search_filter_shortcode() {
    ob_start(); 
    ?>
<div>Test</div>

 <?php
    return ob_get_clean(); 
}
add_shortcode('searchfilter', 'custom_search_filter_shortcode');
