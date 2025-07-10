// Apply validation to all textarea fields
add_filter('wpcf7_validate_textarea*', 'cf7_custom_spam_filter', 20, 2);
add_filter('wpcf7_validate_textarea', 'cf7_custom_spam_filter', 20, 2);

// Apply validation to text fields too (optional)
add_filter('wpcf7_validate_text*', 'cf7_custom_spam_filter', 20, 2);
add_filter('wpcf7_validate_text', 'cf7_custom_spam_filter', 20, 2);

function cf7_custom_spam_filter($result, $tag) {
    $name = $tag['name'];

    // Get submitted value
    $value = isset($_POST[$name]) ? sanitize_text_field($_POST[$name]) : '';

    // Check for spam
    if (cf7_contains_spam_keywords($value)) {
        $result->invalidate($tag, 'Spammy content detected. Please revise your message.');
    }

    return $result;
}
