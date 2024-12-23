 //post page url add to blog
function custom_post_type_permalink($post_link, $post) {
    if ($post->post_type === 'your_custom_post_type') {
        return home_url('/' . $post->post_type . '/' . $post->post_name . '/');
    }
    return $post_link;
}

add_filter('post_type_link', 'custom_post_type_permalink', 10, 2);

//Remove a url location taxonomy slue
function custom_taxonomy_permalink($url, $term, $taxonomy) {
    if ($taxonomy === 'location') {
        $url = home_url('/' . $term->slug . '/');
    }
    return $url;
}
add_filter('term_link', 'custom_taxonomy_permalink', 10, 3);

function remove_taxonomy_base_rewrite_rules($rules) {
    $new_rules = array();
    $terms = get_terms(array(
        'taxonomy' => 'location',
        'hide_empty' => false,
    ));

    foreach ($terms as $term) {
        $new_rules[$term->slug . '/?$'] = 'index.php?location=' . $term->slug;
    }

    return $new_rules + $rules;
}
add_filter('rewrite_rules_array', 'remove_taxonomy_base_rewrite_rules');
