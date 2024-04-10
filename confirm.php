<?php
    include 'connection_inc.php';
    require "./PHPMailer-master/src/PHPMailer.php";
    require "./PHPMailer-master/src/SMTP.php";
    require "./PHPMailer-master/src/Exception.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    $uname=$_GET['uname'];
    $email=$_GET['email'];
    $sname=$_GET['sname'];
    $a_date=$_GET['a_date'];
    $status=$_GET['status'];
    function sendAppointmentNotification($to, $subject, $message) {
        // PHPMailer configuration
        $mail = new PHPMailer(true);
    
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Replace with your SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'nisthapatel1107@gmail.com'; // Replace with your SMTP username
            $mail->Password   = 'iqfo jqrp cocc kuhv'; // Replace with your SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587; // TCP port to connect to
    
            //Recipients
            $mail->setFrom("nisthapatel1107@gmail.com", "NailBug"); // Replace with your email and name
            $mail->addAddress($to); // Add recipient
    
            // Content
            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body    = $message;
    
            // Send email
            $mail->send();
            return true; // Email sent successfully
        } catch (Exception $e) {
            return "Error sending email: {$mail->ErrorInfo}";
        }
    }
    
    // Example usage
    // $status = true; // Set this to true if selected
    $appointmentDate=$a_date;
    $user = $uname;
    $service= $sname;
    $to = $cid; // Replace with the recipient's email address
    
    $subject = 'Appointment Notification';
    
    if ($status) {
        $message = "Dear $user,\n\nYour appointment of $sname on $a_date has been selected.\n\nThank you.";
    } else {
        $message = "Dear $user,\n\nUnfortunately, your appointment of $sname on $a_date has been rejected.\n\nPlease contact us for further assistance.\n\nThank you.";
    }

    $result = sendAppointmentNotification($to, $subject, $message);
    
    if ($result === true) {
        echo '<scrip>alert("Email sent successfully")</scrip>';
    } else {
        echo '<script>alert($result)</script>'; // Print the error message
    }

    
?>