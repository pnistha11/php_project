<?php 
 session_start();
 if(isset($_SESSION['otp']) && isset($_POST['submit'])){
    $otp=$_POST['otp'];
    if($otp == $_SESSION['otp']){
        echo "OK";
        header("location:passwordreset.php");
    }
    else{
        echo "Error";
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

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    </style>
</head>

<body>

    <div class="b1">
        <!-- <div class="container"> -->
        <form method="post">
            <div class="card  col-lg-12" style=" background-color:rgba(255, 182, 193, 0.5);padding:30px"><br>
                <h2 class="font"><u>OTP</u></h2>
                <br>
                <div class="form-group">
                    <label for="uname">
                        <h2>Enter OTP : </h2>
                    </label>
                    <input type="number" name="otp" style="background-color:lavenderblush;" class="form-control"
                        placeholder="Enter OTP">
                </div>
                <div class="btn">
                    <button type="submit" class="btn btn-success" name="submit" id="b">Verify OTP</button>
                </div>
            </div>
        </form>
        <!-- </div> -->
    </div>

</body>

</html>