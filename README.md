#function.php Function to display taxonomy names and links and shortscode
function custom_search_filter_shortcode() {
    ob_start(); 
    ?>
<div class="horizontal-scroll-wrapper">
<button class="scroll-btn left" id="scroll-left"><i class="fa-solid fa-angle-left"></i></button>
<div class="scroll-menu" id="scroll-menu">
<?php
       $terms = get_terms(array(
		   'taxonomy' => array('location', 'escort-type'),
           'hide_empty' => false, 
       ));
      if (!empty($terms) && !is_wp_error($terms)) {
           foreach ($terms as $term) {
    ?>
<a href="<?php echo esc_url(get_term_link($term)); ?>" class="menu-item"><?php echo  $term->name?></a>
<?php } } ?>
</div>
<button class="scroll-btn right" id="scroll-right"><i class="fa-solid fa-angle-right"></i></button>
</div>
 
 
    <?php
    return ob_get_clean(); 
}
add_shortcode('searchfilter', 'custom_search_filter_shortcode');
