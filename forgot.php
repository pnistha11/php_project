<?php 
    include 'connection_inc.php';
    require "./PHPMailer-master/src/PHPMailer.php";
    require "./PHPMailer-master/src/SMTP.php";
    require "./PHPMailer-master/src/Exception.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    
   if(isset($_POST['submit']))
   {
       session_start();

       $email=$_POST['email'];
       $_SESSION['email']=$email;
       $sql="SELECT * FROM user_register WHERE email='$email'";
       $check=mysqli_query($con,$sql);
       $count=mysqli_num_rows($check);
       $_SESSION['email']=$email;
       if($count > 0)
       {
           $otp=rand(1000,9999);

           $_SESSION['otp']=$otp;
           function sendMail($send_to, $otp) {
               $mail = new PHPMailer(true);
               $mail->isSMTP();
               $mail->SMTPAuth = true;
               $mail->SMTPSecure = "tls";
               $mail->Host = "smtp.gmail.com";
               $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
               $mail->Port = 587;
           
               // Enter your email ID
               $mail->Username = "nisthapatel1107@gmail.com";
               $mail->Password = "iqfo jqrp cocc kuhv";

                // Your email ID and Email Title
                $mail->setFrom("nisthapatel1107@gmail.com", "NailBug");
            
                $mail->addAddress($send_to);
            
                // You can change the subject according to your requirement!
                $mail->Subject = "ONE TIME PASSWORD(OTP)";
            
                // You can change the Body Message according to your requirement!
                $mail->Body = "Hello, \nYour ONE TIME PASSWORD for Reset Password !\n Your OTP is {$otp}.";
                $mail->send();
            }
            
                sendMail($email, $otp);
                // Message to print email success!
                echo "<br><div class='alert alert-success col-md-5 offset-3' style='font-size:15pt;'>
                Email Sent Successfully Check Your Email</div>";
                header('Location:otp.php');
        }
        else
        {
            echo "<br><div class='alert alert-danger col-md-5 offset-3' style='font-size:15pt;'>
            You Are Not registered With Us</div>";

           }
        }
?>
<html>

<head>
    <title>Forgot password Page</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.5.1.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <style>
    body {
        /* background-color:lavender; */
        background-image: url(img/back6.jpg);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
    }

    .b1 {
        margin-top: 5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50vh;
    }

    h2 {
        font-weight: bold;
        font-size: 30px;
        color: mediumvioletred;
        font-family: 'Courier New', monospace;
    }

    .font {
        text-align: center;
        /* font-family:'Brush Script MT'; */
        font-family: 'Courier New', monospace;
        font-weight: bold;
        font-size: 45px;
        color: mediumvioletred;
    }

    .btn {
        margin-bottom: 1rem;
        margin-top: 1rem
    }
    </style>
</head>

<body>
    <div class="b1">
        <!-- <div class="container"> -->
        <form method="post">
            <div class="card  col-lg-12" style="background-color: rgba(255, 182, 193, 0.5);padding:20px"><br>
                <h2 class="font"><u>Forgot Password</u></h2>
                <br>
                <div class="form-group">
                    <label for="uname">
                        <h2>Email : </h2>
                    </label>
                    <input type="text" name="email" style="background-color:lavenderblush;" class="form-control" require
                        data-parsley-type="email" placeholder="Enter email">
                </div>
                <div class="btn">
                    <button type="submit" class="btn btn-success" name="submit" id="b">Send OTP</button>
                </div>
            </div>
        </form>
        <!-- </div> -->
    </div>

</body>

</html>