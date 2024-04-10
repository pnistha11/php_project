<?php
    include 'connection_inc.php';
    $sn=$_GET['sn'];
    $sql1= "SELECT rate FROM `services` WHERE `sname`='$sn'";
    $res1=mysqli_query($con,$sql1);

    if(isset($_POST['submit'])){
        $email=$_COOKIE['email'];
        $card_number=$_POST['card_number'];
        $expiry_date=$_POST['expiry_date'];
        $cvv=$_POST['cvv'];
        $amount = $_POST['amount'];
        $tid=rand(10000,20000);
        $sql= "INSERT INTO `payment` (email, card_number,expiry_date,cvv, amount,transaction_id,payment_date) VALUES ('$email','$card_number','$expiry_date','$cvv','$amount','$tid',NOW())";
        $res=mysqli_query($con,$sql);
        if($res){
           // echo "<script>alert('Your payment is Successfully.'\nThank you.);</script>";
            echo "<script>window.location.href='thanks.php?tid=".$tid."'</script>";
        }
        else{
            echo "<script>alert($res)</script>";
        }
    }
?>

<html>
<title>Payment</title>
<link rel="stylesheet" href="bootstrap.min.css">
<script src="https://kit.fontawesome.com/9524e50535.js" crossorigin="anonymous"></script>
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
    margin-left: 40%;
    margin-bottom: 3rem;
}

h2 {
    font-weight: bold;
    font-size: 30px;
    color: mediumvioletred;
    font-family: 'Courier New', monospace;
}
</style>
</head>
<?php  include ('includes/user_header.php');
        ?>

<body>
    <div class="b1">

        <form method="post">
            <div class="card col-lg-4" style=" background-color:rgba(255, 182, 193, 0.5);"><br>
                <h2 class="text-center"><u><b>Payment</b></u></h2>
                <div class="form-group">
                    <label for="card_number">
                        <h6> Card Number:</h6>
                    </label>
                    <input type="text" id="card_number" placeholder="Card Number" class="form-control"
                        style="background-color:lavenderblush;" name="card_number" required>
                </div>
                <div class="form-group">
                    <label for="expire">
                        <h6>Expiry Date (MM/YY):</h6>
                    </label>
                    <input type="text" id="expiry_date" name="expiry_date" class="form-control" pattern="\d{2}/\d{2}"
                        style="background-color:lavenderblush;" placeholder="MM/YY" required>
                </div>
                <div class="form-group"><label for="cvv">
                        <h6> CVV:</h6>
                    </label>
                    <input type="text" class="form-control" placeholder='CVV' id="cvv" name="cvv" pattern="\d{3}"
                        style="background-color:lavenderblush;" required>
                </div>
                <div class="form-group">
                    <label for="amount">
                        <h6>Enter Payment Amount:</h6>
                    </label>
                    <?php
                    while($row=$res1->fetch_assoc()){
                        $amt=$row['rate'];
                    }
                    ?>
                    <input type="text" class="form-control" id="amount" name="amount" value=<?php echo $amt; ?>
                        style="background-color:lavenderblush;" readonly>
                </div>
                <br>
                <div class="btn">
                    <button type="submit" class="btn btn-success" name="submit" id="b">Pay</button><br><br>
                </div>
            </div>
        </form>
    </div>
</body>
<?php 
         include ('includes/footer.php');
        ?>

</html>