<?php
   $error=0;
   include 'connection_inc.php';
   $msg="";
   $msg1="";
   if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $pswd=$_POST['pswd'];
    if(empty($email)){
        $email_error= 'Please Enter Email.';
        $error=1;
    }
    if(empty($pswd)){
        $pswd_error = 'Please enter Password.';
        $error=1;
    }
    if($error==0)
        {
        $sql="select * from `user_register` where email='$email' and pswd='$pswd' ";
        $result=mysqli_query($con,$sql);
        $count=mysqli_num_rows($result);
        if($count>0){
            setcookie('email',$email,time()+2*24*60*60);
            header('location:user_index.php');
        }
        else{
            $msg= "**Invalid email or Password.";
        }
    }
   }
?>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.5.1.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <style>
    body {
        background-image: url(img/back6.jpg);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
    }

    #h2 {
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
        margin-top: 1rem;
    }

    .b1 {
        margin-top: 3rem;
        margin-left: 35%;
        margin-bottom: 3rem
    }
    </style>
</head>
<?php 
         include ('includes/header.php');
        ?>

<body>

    <div class=" b1">
        <div class="card  col-lg-5" style="background-color: rgba(255, 182, 193, 0.5);"><br>
            <form method="post">
                <h2 class="font"><u>Login</u></h2>
                <br>
                <div class="form-group">
                    <label for="uname">
                        <h2 id="h2">Username : </h2>
                    </label>
                    <input type="text" name="email" style="background-color:lavenderblush;" class="form-control"
                        placeholder="Username">
                    <span class='text-danger'><?php if(!empty($email_error)){echo $email_error;};?></span>
                </div>
                <div class="form-group">
                    <label for="pswd">
                        <h2 id="h2">Password : </h2>
                    </label>
                    <input type="password" name="pswd" style="background-color:lavenderblush;" class="form-control"
                        placeholder="Password">
                    <span class='text-danger'><?php if(!empty($pswd_error)){echo $pswd_error;};?></span>
                    <p class="alert"><?php echo $msg ?> </p>
                </div>
                <p class="text-right  mt-2 mb-0"> <a href="forgot.php" class="fw-bold text-body"><u>Forgot
                            Password?</u></a></p><br>
                <div class="text-center">
                    <button type="submit" class="btn btn-success" name="submit" id="b">Sign In</button>
                </div>
                <p class="text-center  mt-5 mb-0">Have register <a href="sign_up.php"
                        class="fw-bold text-body"><u>Register here</u></a></p><br>
            </form>
        </div>
    </div>

</body>
<?php 
          include ('includes/footer.php');
        ?>

</html>