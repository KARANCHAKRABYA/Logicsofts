// Step 1: Shortcode to display reset password form Start
add_shortcode('custom_password_reset_form', 'custom_frontend_reset_password_form');

function custom_frontend_reset_password_form() {
    ob_start();

    $key = isset($_GET['key']) ? sanitize_text_field($_GET['key']) : '';
    $login = isset($_GET['login']) ? sanitize_user($_GET['login']) : '';
    $reset_success = false;
    $message = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset_password_submit'])) {
        $key    = sanitize_text_field($_POST['rp_key']);
        $login  = sanitize_user($_POST['login']);
        $pass1  = $_POST['new_password'];
        $pass2  = $_POST['confirm_password'];

        if ($pass1 !== $pass2) {
            $message = '<div class="alert alert-danger">Passwords do not match.</div>';
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/', $pass1)) {
            $message = '<div class="alert alert-danger">Password must be at least 8 characters with uppercase, lowercase, number, and special character.</div>';
        } else {
            $user = check_password_reset_key($key, $login);

            if (is_wp_error($user)) {
                $message = '<div class="alert alert-danger">Invalid or expired reset link.</div>';
            } else {
                reset_password($user, $pass1);
                $reset_success = true;
            }
        }
    }

    if ($reset_success) {
        echo '<div class="alert alert-success">Password reset successful! Redirecting to login page...</div>';
        echo '<script>
            setTimeout(function(){
                window.location.href = "' . esc_url(home_url('/ladybugss/login/')) . '";
            }, 2000);
        </script>';
        return ob_get_clean(); 
    }

    if (!$key || !$login) {
        echo "<div class='alert alert-danger'>Invalid reset link.</div>";
        return ob_get_clean();
    }

    echo $message;


    ?>
    <form method="post" class="custom-password-reset-form">
        <input type="hidden" name="rp_key" value="<?php echo esc_attr($key); ?>">
        <input type="hidden" name="login" value="<?php echo esc_attr($login); ?>">

        <div class="mb-20">
            <input type="password" name="new_password" class="form-control" placeholder="Enter New Password" required>
        </div>
        <div class="mb-20">
            <input type="password" name="confirm_password" class="form-control"  placeholder="Confirm Password" required>
        </div>
        <button type="submit" name="reset_password_submit" class="commonBtn">Reset Password</button>
    </form>
    <?php

    return ob_get_clean();
}
// Step 1: Shortcode to display reset password form Ends
