<?php
require("connection_inc.php");
// require("functions_inc.php");
$msg='';
if(isset($_POST['submit'])){
    $uname=$_POST['uname'];
    $pswd=$_POST['pswd'];
    $sql="select * from admin_users where uname='$uname' and pswd='$pswd' ";
    $res=mysqli_query($con,$sql);
    $count=mysqli_num_rows($res);
    if($count>0){
        $_COOKIE['uname'] = $uname;
        setcookie('uname',$uname,time()+24*60*60);
        header('Location:dashboard.php');
    }
    else{
        $msg="Please enter correct login details";
    }
}
?>

<html>

<head>
    <title>Admin Login Page</title>
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
    }

    .b1 {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
    }

    form {
        width: 500px;
        height: 485px;
        border: 2px solid lightpink;
        padding: 30px;
        background-color: rgba(255, 182, 193, 0.5);
        border-radius: 15px;
    }
    </style>
</head>

<body>
    <br><br><br><br><br>
    <div class="b1">
        <form method="post">
            <div class="card col-lg-12" style="background-color: rgba(255, 182, 193, 0.5);"><br>
                <h2 class="font"><u>Admin</u></h2>
                <br>
                <div class="form-group">
                    <label for="uname">
                        <h2 id="h2">User Name : </h2>
                    </label>
                    <input type="text" name="uname" style="background-color:lavenderblush;" class="form-control"
                        placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="pswd">
                        <h2 id="h2">Password : </h2>
                    </label>
                    <input type="password" name="pswd" style="background-color:lavenderblush;" class="form-control"
                        placeholder="Password" required>
                </div>
                <div class="alert" style="color:red"><?php echo $msg?></div>
                <div class="btn">
                    <button type="submit" class="btn btn-success" name="submit" id="b">Sign In</button>
                </div>

            </div>
        </form>
    </div>
    <br><br>
</body>


</html>