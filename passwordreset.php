<?php
  include "connection_inc.php";
  if(isset($_POST['submit'])){
    $email=$_SESSION['email'];
    $pswd=$_POST['pswd'];
    $sql="update `user_register` set pswd='$pswd' where email='$email'";
    $res=mysqli_query($con,$sql);
    if($res){
        echo "<script>alert ('Your Password is Reset Successfully.');</script>";
        header("location:login.php");
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
        margin-top: 6rem;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50vh;
        margin-bottom: 8rem
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

    form {
        width: 450px
    }

    .alert {
        color: red;
        font-weight: bold;
        font-size: 15px;
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
            <div class="card c1 col-lg-12" style=" background-color:rgba(255, 182, 193, 0.5);padding:30px"><br>
                <h2 class="font"><u>Reset Password</u></h2>
                <br>
                <div class="form-group">
                    <label for="uname">
                        <h2>Enter New Password : </h2>
                    </label>
                    <input type="text" name="pswd" style="background-color:lavenderblush;" class="form-control"
                        placeholder="Enter New Password">
                </div>
                <div class="btn">
                    <button type="submit" class="btn btn-success" name="submit" id="b">Generate New
                        Password</button>
                </div>
            </div>
        </form>
        <!-- </div> -->
    </div>

</body>

</html>