<?php 
    include "connection_inc.php";
    $email=$_COOKIE['email'];
    $sql="SELECT * FROM `report`,`user_register`,`appoinment_mst`,`services`,`payment` WHERE `services`.`sname`=`appoinment_mst`.`sname` AND `services`.`sname`=`report`.`sid` AND `report`.`uid`=`user_register`.`email`  AND `user_register`.`email`='$email' AND `appoinment_mst`.`status`='Selected' AND `appoinment_mst`.`email`='$email' AND `payment`.`email`='$email' ";
    $res=mysqli_query($con,$sql);
?>
<html>

<head>
    <title>View Report</title>
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

    h1 {
        text-align: center
    }

    #c1 {
        margin-top: 5rem;
        margin-bottom: 5rem;
        margin-left: 5rem;
        /* background-color: rgba(255, 182, 193, 0.5); */
    }

    table {
        width: 100%;
        background: rgba(255, 182, 193, 0.5);
        border-radius: 10px;
    }

    th,
    td {
        border-bottom: 1px solid #ddd;
    }

    .b {
        text-align: center;
    }
    </style>
</head>
<?php 
         include ('includes/user_header.php');
        ?>

<body>
    <div class="container">
        <!-- <div class="card" > -->
        <!-- <div class="card-header">
                <h1>View Repot :</h1>
            </div> -->
        <div class="card-body" id="c1">
            <div class="col-md-12">
                <?php 
                            if(mysqli_num_rows($res) >0){
                            ?>
                <table class="table ">
                    <?php 
                        $i=1;
                        while($row=mysqli_fetch_array($res)) {  
                    ?>
                    <tr>
                        <th rowspan="1" colspan="12">
                            <h4 class="text-center">View invoice</h4>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <h6 class="td1">Report Id :&nbsp; <?php echo $row['id'] ?></h6>
                        </td>
                        <td colspan="3">
                            <h6 class="td1">Customer Name : </h6>
                        </td>
                        <td colspan="5"> <?php echo $row['uname'] ?></td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <h6 class="td1">Email :</h6>
                        </td>
                        <td colspan="3"> <?php echo $row['email'] ?></td>
                        <td colspan="3">
                            <h6 class="td1">Contact :</h6>
                        </td>
                        <td colspan="3"><?php  echo $row['contact']?></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <h6 class="td1">Appoiment Date :</h6>
                        </td>
                        <td colspan="7"><?php  echo $row['a_date']?></td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <h6 class="td1">Service name :</h6>
                        </td>
                        <td colspan="7"> <?php echo $row['sname'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <h6 class="td1">Transaction ID :</h6>
                        </td>
                        <td colspan="7"><?php echo $row['transaction_id'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <h6 class="td1">Amount :</h6>
                        </td>
                        <td colspan="7"><?php echo $row['amount'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="10"></td>
                    </tr>
                </table>
                <?php } ?>
                <?php }
                else{ ?>
                <div class="card-header">
                    <h5 style="color:black">No Records yet!!</h5>
                </div>
                <?php
                } ?>
            </div>
        </div>
        <!-- </div> -->
    </div>
</body>
<?php 
          include ('includes/footer.php');
        ?>

</html>