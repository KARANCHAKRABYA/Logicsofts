// Change the default email sender name Ends
add_filter('wp_mail_from_name', function($name) {
    return 'Ladybugss Team'; 
});

add_filter('wp_mail_from', function($email) {
    return 'info@ladybugss.com'; 
});
// Change the default email sender name Ends

// Add Approve/Deny links to each user row
add_filter('user_row_actions', function($actions, $user) {
    if (!current_user_can('administrator')) return $actions;

    $status = get_user_meta($user->ID, 'account_status', true);

    $approve_url = wp_nonce_url(
        add_query_arg(['user_status_action' => 'approve', 'user_id' => $user->ID]),
        'user_status_action_' . $user->ID
    );
    $deny_url = wp_nonce_url(
        add_query_arg(['user_status_action' => 'deny', 'user_id' => $user->ID]),
        'user_status_action_' . $user->ID
    );

    if ($status === 'approved') {
        $actions['deny_user'] = '<a href="' . $deny_url . '" style="color:red;">Deny</a>';
    } elseif ($status === 'denied') {
        $actions['approve_user'] = '<a href="' . $approve_url . '" style="color:green;">Approve</a>';
    } else {
        // Default is Pending
        $actions['approve_user'] = '<a href="' . $approve_url . '" style="color:green;">Approve</a>';
        $actions['deny_user'] = '<a href="' . $deny_url . '" style="color:red;">Deny</a>';
    }

    return $actions;
}, 10, 2);

// Handle Approve/Deny actions
add_action('admin_init', function() {
    if (!isset($_GET['user_status_action'], $_GET['user_id'])) return;

    $action = $_GET['user_status_action'];
    $user_id = (int) $_GET['user_id'];

    if (!current_user_can('administrator')) return;
    if (!wp_verify_nonce($_GET['_wpnonce'], 'user_status_action_' . $user_id)) return;

    if ($action === 'approve') {
        update_user_meta($user_id, 'account_status', 'approved');

        // Optionally send password email on approval
        $user = get_userdata($user_id);
        $email = $user->user_email;
        $name  = $user->display_name;
        $username = $user->user_login;

        // Generate a password if needed
        $password = wp_generate_password();
        wp_set_password($password, $user_id); // reset to new password
		
		$headers = array('Content-Type: text/html; charset=UTF-8');

$message = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ladybugss</title>
</head>
<body style="margin:0px; font-family: sans-serif;">	
    <div style="width:500px; margin:5px auto; padding:4px; background:#000000;">    	
        <div style="width:100%; height:100%; background:#000; padding:0px 40px 40px 40px; box-sizing: border-box;">        	
            <div style="padding:30px 0 10px; text-align:center;">
                <a href="https://ladybugss.com/">
                    <img style="width:200px;" src="https://ladybugss.com/wp-content/uploads/2025/07/ladybugss_logo.webp" alt="Ladybugss" title="Ladybugss"/>
                </a>
            </div>
            <div>
                <div style="margin-top:25px; margin-bottom:20px; background:#c5961d; padding:1px;"></div>
                 <p style="font-size:15px; font-weight:500; color:#FFF; text-align:left; margin-bottom:15px; line-height:24px;">Hi ' . esc_html($name) . ',</strong></p>     
				 <p style="font-size:16px; font-weight:500; color:#FFF; text-align:left; margin-bottom:20px; line-height:24px;">Your account has been approved. Please login with below details.</p>
				 <p style="padding-top:10px; font-size:13px; color:#FFFFFF; margin:0px;">
                	<span style="font-weight:700; color:#FFFFFF; padding-right:5px; width:100px; display:inline-block;">Username :</span>' . esc_html($username) . '
                </p>
				<p style="padding-top:10px; font-size:13px; color:#FFFFFF; margin:0px;">
                	<span style="font-weight:700; color:#FFFFFF; padding-right:5px; width:100px; display:inline-block;">Password :</span>' .esc_html($password). '
                </p>
				
				<p style="padding-top:10px; font-size:13px; color:#FFFFFF; margin:0px;">
                	<span style="font-weight:700; color:#FFFFFF; padding-right:5px; width:100px; display:inline-block;">Login Url :</span>' .home_url('login'). '
                </p>
                <div style="margin-top:30px; margin-bottom:15px; background:#c5961d; padding:1px;"></div>               
            </div>            
            
            <div>           	
                <p style="padding-top:0px;  font-size:18px; font-weight:400; color:#FFF; margin:0px 0 10px;">
                	Best Regards,
                </p>
                <p style="padding-top:10px; font-size:20px; font-weight:500; color:#FFF; margin:0px;">
                	Ladybugss Team<br />
                    <a href="#" target="_blank" style="margin:10px 0 0; display: inline-block;"><img style="width:180px;" src="https://ladybugss.com/wp-content/uploads/2025/07/ladybugss_logo.webp" alt="Ladybugss" title="Ladybugss"/></a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>';
		$subject='Your account is approved';

        wp_mail($email,$subject, $message,$headers);

    } elseif ($action === 'deny') {
        update_user_meta($user_id, 'account_status', 'denied');
		 $user = get_userdata($user_id);
        $email = $user->user_email;
        $name  = $user->display_name;
       

        // Generate a password if needed
        $password = wp_generate_password();
        wp_set_password($password, $user_id); // reset to new password
		
		$headers = array('Content-Type: text/html; charset=UTF-8');

$message = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ladybugss</title>
</head>
<body style="margin:0px; font-family: sans-serif;">	
    <div style="width:500px; margin:5px auto; padding:4px; background:#000000;">    	
        <div style="width:100%; height:100%; background:#000; padding:0px 40px 40px 40px; box-sizing: border-box;">        	
            <div style="padding:30px 0 10px; text-align:center;">
                <a href="https://ladybugss.com/">
                    <img style="width:200px;" src="https://ladybugss.com/wp-content/uploads/2025/07/ladybugss_logo.webp" alt="Ladybugss" title="Ladybugss"/>
                </a>
            </div>
            <div>
                <div style="margin-top:25px; margin-bottom:20px; background:#c5961d; padding:1px;"></div>
                 <p style="font-size:15px; font-weight:500; color:#FFF; text-align:left; margin-bottom:15px; line-height:24px;">Hi ' . esc_html($name) . ',</strong></p>     
				 <p style="font-size:16px; font-weight:500; color:#FFF; text-align:left; margin-bottom:20px; line-height:24px;">Your account request has been denied by the administrator.If you believe this is a mistake or need further assistance, please contact support.</p>
				
                <div style="margin-top:30px; margin-bottom:15px; background:#c5961d; padding:1px;"></div>               
            </div>            
            
            <div>           	
                <p style="padding-top:0px;  font-size:18px; font-weight:400; color:#FFF; margin:0px 0 10px;">
                	Best Regards,
                </p>
                <p style="padding-top:10px; font-size:20px; font-weight:500; color:#FFF; margin:0px;">
                	Ladybugss Team<br />
                    <a href="#" target="_blank" style="margin:10px 0 0; display: inline-block;"><img style="width:180px;" src="https://ladybugss.com/wp-content/uploads/2025/07/ladybugss_logo.webp" alt="Ladybugss" title="Ladybugss"/></a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>';
		$subject='Your account is denied';

        wp_mail($email,$subject, $message,$headers);
    }

    // Redirect to users list
    wp_redirect(admin_url('users.php'));
    exit;
});
