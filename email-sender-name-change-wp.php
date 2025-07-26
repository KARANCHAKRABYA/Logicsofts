// Change the default email sender name Ends
add_filter('wp_mail_from_name', function($name) {
    return 'Ladybugss Team'; 
});

// Change the default email sender address
add_filter('wp_mail_from', function($email) {
    return 'no-reply@wave-69.co.uk'; 
});
// Change the default email sender name Start
