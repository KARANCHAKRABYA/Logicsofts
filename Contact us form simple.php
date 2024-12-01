<?php

if(isset($_POST['workwith'])) {

    $to = 'karan@logicsofts.com,sachin@wave69.co.uk'; 
    $subject = "voxlondonescorts.co.uk work with us details";
    $from = $_POST['email'];

    $name = $_POST['name'];
    $Age = $_POST['age'];
    $ContactNumber = $_POST['contactnumber'];
    $EmailAddress = $_POST['email'];
    $City = $_POST['city'];
    $Location = $_POST['location'];
    $DressSize = $_POST['dresssize'];
    $Eyes = $_POST['eyes'];
    $HairColour = $_POST['haircolour'];
    $Weight = $_POST['weight'];
    $Measurement = $_POST['measurement'];
    $Nationality = $_POST['nationality'];
    $Languages = $_POST['languages'];
    $AreyouOpenMinded = $_POST['minded'];
    $AreyourBreastsNatural = $_POST['breasts'];
    $CanyouAcceptIncall = $_POST['incall'];
    $CanyouTravel = $_POST['travel'];
   

    // HTML Message Content
    $message_body = '
     <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Vox London Escorts</title>
    </head>
    <body style="margin:0px; font-family: sans-serif;">
        <div style="width:500px; margin:5px auto; padding:6px; background:#000;">
            <div style="width:100%; height:100%; background:white; padding:0px 40px 40px 40px; box-sizing: border-box;">
                <div style="padding:10px 0; text-align:center;"><img style="width:120px;" src="https://www.voxlondonescorts.co.uk/wp-content/uploads/2018/06/cropped-vox-london-escorts.png" alt="Grande Caffe Bar" title="Grande Caffe Bar"/></div>
                <p style="font-size:15px; font-weight:500; color:#000; text-align:center; margin-bottom:15px; line-height:24px;">Hello <strong>Admin</strong></p>
                <p style="font-size:15px; font-weight:500; color:#000; text-align:center; margin-bottom:25px; line-height:24px;">We have received a new table booking from the '.$name.'. please check the details below.</p>
                <div>
                    <div style="margin-top:25px; margin-bottom:10px; background:#000; padding:1px;"></div>
                    <p style="padding-top:10px; font-size:13px; color:#000; margin:0px;">
                      <span style="font-weight:700; color:#000; padding-right:5px; width:200px; display:inline-block;">Your Name :</span>'.$name.'
                    </p>
                    <p style="padding-top:10px; font-size:13px; color:#000; margin:0px;">
                      <span style="font-weight:700; color:#000; padding-right:5px; width:200px; display:inline-block;">Age :</span>'.$Age.'
                    </p>
                    <p style="padding-top:10px; font-size:13px; color:#000; margin:0px;">
                      <span style="font-weight:700; color:#000; padding-right:5px; width:200px; display:inline-block;">Contact Number :</span>'.$ContactNumber.'
                    </p>
                    <p style="padding-top:10px; font-size:13px; color:#000; margin:0px;">
                      <span style="font-weight:700; color:#000; padding-right:5px; width:200px; display:inline-block;">Email Address :</span>'.$EmailAddress.'
                    </p>
                    <p style="padding-top:10px; font-size:13px; color:#000; margin:0px;">
                      <span style="font-weight:700; color:#000; padding-#FFFFFFright:5px; width:200px; display:inline-block;">City :</span>'.$City.'
                    </p>
                    <p style="padding-top:10px; font-size:13px; color:#000; margin:0px;">
                      <span style="font-weight:700; color:#000; padding-right:5px; width:200px; display:inline-block;">Location :</span>'.$Location.'
                    </p>
                    <p style="padding-top:10px; font-size:13px; color:#000; margin:0px;">
                      <span style="font-weight:700; color:#000; padding-right:5px; width:200px; display:inline-block;">Dress Size :</span>'.$DressSize.'
                    </p>
                    <p style="padding-top:10px; font-size:13px; color:#000; margin:0px;">
                      <span style="font-weight:700; color:#000; padding-right:5px; width:200px; display:inline-block;">Eyes :</span>'.$Eyes.'
                    </p>
                    <p style="padding-top:10px; font-size:13px; color:#000; margin:0px;">
                      <span style="font-weight:700; color:#000; padding-right:5px; width:200px; display:inline-block;">Hair Colour :</span>'.$HairColour.'
                    </p>
                    <p style="padding-top:10px; font-size:13px; color:#000; margin:0px;">
                      <span style="font-weight:700; color:#000; padding-right:5px; width:200px; display:inline-block;">Weight :</span>'.$Weight.'
                    </p>
                    <p style="padding-top:10px; font-size:13px; color:#000; margin:0px;">
                      <span style="font-weight:700; color:#000; padding-right:5px; width:200px; display:inline-block;">Measurement :</span>'.$Measurement.'
                    </p>
                    <p style="padding-top:10px; font-size:13px; color:#000; margin:0px;">
                      <span style="font-weight:700; color:#000; padding-right:5px; width:200px; display:inline-block;">Nationality :</span>'.$Nationality.'
                    </p>
                    <p style="padding-top:10px; font-size:13px; color:#000; margin:0px;">
                      <span style="font-weight:700; color:#000; padding-right:5px; width:200px; display:inline-block;">Languages  :</span>'.$Languages.'
                    </p>
                    <p style="padding-top:10px; font-size:13px; color:#000; margin:0px;">
                      <span style="font-weight:700; color:#000; padding-right:5px; width:200px; display:inline-block;">Are you Open Minded? :</span>'.$AreyouOpenMinded.'
                    </p>
                    <p style="padding-top:10px; font-size:13px; color:#000; margin:0px;">
                      <span style="font-weight:700; color:#000; padding-right:5px; width:200px; display:inline-block;">Are your Breasts Natural? :</span>'.$AreyourBreastsNatural.'
                    </p>
                    <p style="padding-top:10px; font-size:13px; color:#000; margin:0px;">
                      <span style="font-weight:700; color:#000; padding-right:5px; width:200px; display:inline-block;">Can you Accept Incall? :</span>'.$CanyouAcceptIncall.'
                    </p>
                    <p style="padding-top:10px; font-size:13px; color:#000; margin:0px;">
                      <span style="font-weight:700; color:#000; padding-right:5px; width:200px; display:inline-block;">Can you Travel? :</span>'.$CanyouTravel.'
                    </p>
                    <div style="margin-top:15px; background:#000; padding:1px;"></div>
                </div>            
                <div> 
                <p style="padding-top:0px; font-size:24px; text-align:center; font-weight:900; color:#000; margin:30px 0 0;">
                  Thank you!
                </p>
                <p style="padding-top:10px; font-size:18px; text-align:center; font-weight:500; color:#000; margin:0px;">
                  From the Vox London Escorts Team<br /><br />
                    <a href="https://www.voxlondonescorts.co.uk/" target="_blank"><img style="width:80px;" src="https://www.voxlondonescorts.co.uk/wp-content/uploads/2018/06/cropped-vox-london-escorts.png" alt="Vox London Escorts" title="Vox London Escorts"/></a>
                </p>
            </div>
         
        </div>
    </div>
</body>
</html> ';

    $mime_boundary = "==Multipart_Boundary_x" . md5(mt_rand()) . "x";

    // Headers for the email
    $headers = "From: $from\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"{$mime_boundary}\"\r\n";

    // Multipart message
    $message = "This is a multi-part message in MIME format.\n\n";
    $message .= "--{$mime_boundary}\n";
    $message .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    $message .= "Content-Transfer-Encoding: 7bit\n\n";
    $message .= $message_body . "\n\n";

    // Attach files if any
    foreach($_FILES as $userfile) {
        $tmp_name = $userfile['tmp_name'];
        $type = $userfile['type'];
        $name = $userfile['name'];
        $size = $userfile['size'];

        if (file_exists($tmp_name)) {
            if(is_uploaded_file($tmp_name)) {
                $file = fopen($tmp_name, 'rb');
                $data = fread($file, filesize($tmp_name));
                fclose($file);
                $data = chunk_split(base64_encode($data));

                $message .= "--{$mime_boundary}\n";
                $message .= "Content-Type: {$type}; name=\"{$name}\"\n";
                $message .= "Content-Disposition: attachment; filename=\"{$name}\"\n";
                $message .= "Content-Transfer-Encoding: base64\n\n";
                $message .= $data . "\n\n";
            }
        }
    }

    $message .= "--{$mime_boundary}--\n";

    if (mail($to, $subject, $message, $headers)) {
        echo '<script>';
        echo 'self.location = "thankyou-work.html"';
        echo '</script>';
        exit();
    } else {
        echo "Error in sending mail";
    }
}
?>
