<?php
    $error=0;
    include 'connection_inc.php';
    $msg="";
    $sql="SELECT * FROM `services` ORDER BY id";
    $res=mysqli_query($con,$sql);
    if(isset($_POST['submit'])){
        $email=$_COOKIE['email'];
        // $uname=$_POST['uname'];
        $sname=$_POST['sname'];
        $a_date=$_POST['a_date'];
        if(empty($sname)){
                $s_error = 'Please select service.';
                $error=1;
        }
        if(empty($a_date)){
            $a_error = 'Please Select date&time.';
            $error=1;
        }
         if($error==0){
            $sql=mysqli_query($con,"INSERT INTO `appoinment_mst`( email, sname, a_date) VALUES ('$email','$sname','$a_date')");
         $result=mysqli_query($con,$sql);
          if($sql){
            // echo "<script>alert('Thank You, Your appointment booked Successfully. ')</script>";
             echo "<script>window.location.href='user_payment.php?sn=".$sname."'</script>";  
          }
         }
        }
?>
<html>

<head>
    <title>Book Appoinment</title>
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
        margin-bottom: 3rem
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
        font-size: 35px;
        color: mediumvioletred;
    }
    </style>
</head>
<?php  include ('includes/user_header.php');
        ?>

<body>
    <div class="b1">

        <form method="post">
            <div class="card c1 col-lg-6" style=" background-color:rgba(255, 182, 193, 0.5);"><br>
                <h2 class="font"><u>Get your Appoinment</u></h2>
                <br>
                <div class="form-group">
                    <label for="type">
                        <h2>Select Type : </h2>
                    </label>
                    <select class="form-control" name="sname" style="background-color:lavenderblush;" id="dropSelect"
                        require>
                        <option name="sname">Select Type</option>
                        <?php 
                                $i=1;
                                while($row=mysqli_fetch_array($res)) {  
                                    
                                echo "
                                <option>".$row['sname']."</option>
                                    <?php } ?>" ;
                        }
                        ?>
                    </select>
                    <span class='text-danger'><?php if(!empty($s_error)){echo $s_error;};?></span>
                </div>
                <div class="form-group">
                    <label for="date">
                        <h2>Appoinment Date & Time : </h2>
                    </label>
                    <input type="datetime-local" name="a_date" min="<?php echo date('Y-m-d\TH:i'); ?>"
                        style="background-color:lavenderblush;" class="form-control">
                    <span class='text-danger'><?php if(!empty($a_error)){echo $a_error;};?></span>
                </div>

                <br>
                <div class="btn">
                    <button type="submit" class="btn btn-success" name="submit" id="b">Book</button><br><br>
                </div>
            </div>
        </form>
    </div>
</body>
<?php 
         include ('includes/footer.php');
        ?>

</html>