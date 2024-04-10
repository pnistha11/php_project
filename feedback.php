<?php 
    include 'connection_inc.php';
    $sql="select * from `feedback`";
    $res=mysqli_query($con,$sql);
?>
<html>

<head>
    <title>Feedback Page</title>
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

    #b1 {
        background-color: rgba(255, 182, 193, 0.5);
        border-radius: 10px;
        margin-top: 3rem;
        margin-bottom: 3rem
    }

    table {
        width: 100%;
        background-color: rgba(255, 182, 193, 0.5);
        /* border-radius: 10px; */
    }

    th,
    td {
        border-bottom: 1px solid #ddd;
        font-size: 17px;
        font-weight: bold
    }

    .card {
        margin-top: 3rem;
        background-color: rgba(255, 182, 193, 0.5);
        border-radius: 5px;
    }

    .h {
        margin-top: 2rem;
        text-align: center;
        background-color: rgba(255, 182, 193, 0.5);
    }
    </style>
</head>

<body>
    <?php include  ('includes/header.php'); ?>
    <div class="container" id="b1">
        <!-- <div class="card" id="b1"> -->
        <div class="container-fluid">
            <div class="h"><br>
                <h2><u>Customer`s Feedback</u></h2>
            </div>
            <div class="card-body">
                <?php 
                            if(mysqli_num_rows($res) >0){
                            ?>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Feedback</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $i=1;
                                            while($row=mysqli_fetch_array($res)) {  
                                            ?>
                        <tr>
                            <td><?php echo "*" ?></td>
                            <td><?php echo $row['fb'] ?></td>
                        </tr>
                        <?php }}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<?php 
          include ('includes/footer.php');
        ?>


</html>