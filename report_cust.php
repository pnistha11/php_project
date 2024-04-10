<?php
    include "connection_inc.php";
    $email=$_COOKIE['email'];
    $sql="SELECT * FROM `appoinment_mst` where email='$email'";
    $res=mysqli_query($con,$sql);
?>

<html>

<head>
    <title>View Report</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.5.1.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="angular.min.js"></script>
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

    .card {
        margin-top: 5rem;
        margin-bottom: 5rem;
        margin-left: 5rem;
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
        <div class="card col-lg-10" style="background:rgba(255, 182, 193, 0.5);">
            <div class="card-header">
                <h1>View Status</h1>
            </div>
            <div class="card-body" ng-app="">
                <input type="checkbox" ng-model="showHide1"> View Status <br><br>
                <table class="table table-bordered table-striped table-hover" ng-hide="showHide1">
                    <thead>
                        <tr>
                            <th>Service Name</th>
                            <th>Appointment Date & Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php 
                                        if(mysqli_num_rows($res) >0){
                                        ?>
                    <?php 
                                        $i=1;
                                        while($row=mysqli_fetch_array($res)) {  
                                        ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['sname']; ?></td>
                            <td><?php echo $row['a_date']; ?></td>
                            <?php if($row['status']==""){ ?>
                            <td><?php echo "Not Updated Yet"; ?></td>
                            <?php } else { ?>
                            <td><?php  echo $row['status'];?></td><?php } ?>
                        </tr>
                    </tbody>
                    <?php }?>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
</body>
<?php 
          include ('includes/footer.php');
        ?>

</html>