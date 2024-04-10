<?php
         $error=0;
         include "connection_inc.php";
         $msg="";
         if(isset($_POST['submit']))
         {
            $uname = $_POST['uname'];
            $cpswd = $_POST['cpswd'];
            $pswd = $_POST['pswd'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];

            if(empty($uname)){
                $uname_error = 'Please enter name.';
                $error=1;
            }
            else if(!preg_match('/^[a-zA-Z]*$/',$uname)){
                $uname_error = 'Only latters are allowed.';
                $error=1;
            }
            if(empty($email)){
                $email_error = 'Please enter email.';
                $error=1;
            }
            else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $email_error = 'Invalidate Email Formate.';
                $error=1;
            }
            if(empty($contact)){
                $contact_error = 'Please enter Contact number.';
                $error=1;
            }
            else if(strlen($contact) < 10){
                $contact_error="Please enter correct number.";
                $error=1;
            } 
            if(empty($pswd)){
                $pswd_error = 'Please enter Password.';
                $error=1;
            }
            else if (strlen($pswd) < 6){
                $pswd_error="Password must be 6 char. ";
                $error=1;
            }
            if(empty($cpswd)){
                $cpswd_error = 'Please enter Confirm Password.';
                $error=1;
            }
            elseif($pswd!=$cpswd){
                $check_error = 'Password not matched.';
                $error=1;
            }
            if($error==0)
            {
            $sql="insert into `user_register`(uname,pswd,email,contact,`registration_date`) values('$uname','$pswd','$email','$contact',NOW())";
                $result=mysqli_query($con,$sql);
                header('location:login.php');
            }
            else{
                $msg="Error.";
            }
         }
?>
<html>

<head>
    <title>Registration Page</title>
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
        margin-top: 3rem;
        margin-left: 35%;
    }

    #h2 {
        font-weight: bold;
        font-size: 27px;
        color: mediumvioletred;
        font-family: 'Courier New', monospace;
    }

    a:hover {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .font {
        text-align: center;
        /* font-family:'Brush Script MT'; */
        font-family: 'Courier New', monospace;
        font-weight: bold;
        font-size: 45px;
        color: mediumvioletred;
        margin-top: 1rem;
    }

    p {
        font-weight: bold;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    </style>
</head>
<?php 
         include ('includes/header.php');
        ?>
<br>

<body>
    <div class="b1">

        <form action="" method="post">
            <div class="card col-lg-5 " style=" background-color: rgba(255, 182, 193, 0.5);">
                <h2 class="text-center font"><u>Sign Up</u></h2><br>
                <div class="form-group">
                    <label for="user">
                        <h2 id="h2">Username :</h2>
                    </label>
                    <input type="text" name="uname" id="username" style="background-color:lavenderblush;"
                        class="form-control" placeholder="Enter Username ">
                    <span class='text-danger'><?php if(!empty($uname_error)){echo $uname_error;};?></span>
                </div>
                <div class="form-group">
                    <label for="email">
                        <h2 id="h2">Email :</h2>
                    </label>
                    <input type="email" name="email" id="email" style="background-color:lavenderblush;"
                        class="form-control" placeholder="Enter Email ">
                    <span class='text-danger'><?php if(!empty($email_error)){echo $email_error;};?></span>
                </div><br>
                <div class="form-group">
                    <label for="contact">
                        <h2 id="h2">Contact :</h2>
                    </label>
                    <input type="number" name="contact" id="contact" style="background-color:lavenderblush;"
                        class="form-control" placeholder="Enter Contact ">
                    <span class='text-danger'><?php if(!empty($contact_error)){echo $contact_error;};?></span>
                </div><br>
                <div class="form-group">
                    <label for="pwd">
                        <h2 id="h2">Password :</h2>
                    </label>
                    <input type="password" name="pswd" id="pwd" style="background-color:lavenderblush;"
                        class="form-control" placeholder="Enter Password ">
                    <span class='text-danger'><?php if(!empty($pswd_error)){echo $pswd_error;};?></span>
                </div>
                <div class="form-group">
                    <label for="cnpwd">
                        <h2 id="h2">Confirm Password :</h2>
                    </label>
                    <input type="password" name="cpswd" id="cnpwd" style="background-color:lavenderblush;"
                        class="form-control" placeholder="Re-enter Password ">
                    <span class='text-danger'><?php if(!empty($cpswd_error)){echo $cpswd_error;};?></span>
                    <span class='text-danger'><?php if(!empty($check_error)){echo $check_error;};?></span>
                </div>
                <div class="text-center">
                    <button class="btn btn-success" id="btn" type="submit" name="submit"> Sign Up</button>
                </div>
                <p class="text-danger"><?php echo $msg; ?> </p>
                <p class="text-center  mt-5 mb-0">Already have a account? <a href="login.php"
                        class="fw-bold text-body"><u>Login here</u></a></p><br>
        </form>
    </div>
    </div>
</body>
<?php 
          include ('includes/footer.php');
        ?>

</html>