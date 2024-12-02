 <form name="workwithus" action="<?php echo home_url(); ?>/bookingdetails.php" method="post" enctype="multipart/form-data" onsubmit="return validateRecaptcha()">
<div class="col-md-12 col-sm-12 col-xs-12 work-form-area">
               <div class="g-recaptcha" data-sitekey="6LePG5AqAAAAABFqKk4xNhlU0__bOI1Jt6kJhvjF"></div>
            </div>
<div class="error" id="recaptcha-error"></div>
 <script>
        function validateRecaptcha() {
            const response = grecaptcha.getResponse();
            if (response.length === 0) {
                document.getElementById('recaptcha-error').innerText = 'Please complete the reCAPTCHA.';
                return false; // Prevent form submission
            } else {
                document.getElementById('recaptcha-error').innerText = ''; // Clear error message
                return true; // Allow form submission
            }
        }
    </script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $recaptcha_secret = '6LePG5AqAAAAAKeXtXsqb2HiKxSMwWt72h9Av0eo'; 
    $recaptcha_response = $_POST['g-recaptcha-response'];

   
    $recaptcha_verify_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_verify_data = [
        'secret' => $recaptcha_secret,
        'response' => $recaptcha_response
    ];

    
    $response = wp_remote_post($recaptcha_verify_url, [
        'method'    => 'POST',
        'body'      => $recaptcha_verify_data,
    ]);

   
    $body = wp_remote_retrieve_body($response);
    $result = json_decode($body);

   
    if ($result->success) {
        

        echo 'Thank you for your submission!';
    } else {
       
        echo 'Please verify that you are not a robot.';
    }
}

?>
