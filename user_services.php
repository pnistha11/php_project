<?php
    include 'connection_inc.php';
    $sql="SELECT * FROM `services` ORDER BY id";
    $res=mysqli_query($con,$sql);
?>

<html>

<head>
    <title>Services Page</title>
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

    .card {
        margin-top: 3rem;
        background: rgba(255, 182, 193, 0.5);
        border-radius: 10px;
        margin-bottom: 5rem;
    }

    .card-header,
    .card-body {
        padding: 1rem;
    }

    .card-header {
        background: lavender;
        display: flex;
        align-items: center;
        border-bottom: 1px solid #f0f0f0;
        justify-content: space-between;
    }

    table {
        width: 100%;
        background: rgba(255, 182, 193, 0.5);
        border-radius: 10px;
    }

    th,
    td {
        border-bottom: 1px solid #ddd;
        border: 2px solid mediumvioletred;
    }
    </style>
</head>
<?php include('includes/user_header.php');
    ?>

<body>
    <div class="container">
        <div class="card" style="background: rgba(255, 182, 193, 0.5);">
            <div class="card-header">
                <h2>Our Services</h2>
                <button class="btn btn-success"><a href="appoinment.php" class="text-white">Book </a></button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <?php if (mysqli_num_rows($res) > 0) { ?>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Rate</th>
                            <th>Image</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($row = mysqli_fetch_array($res)) { ?>
                        <tr>
                            <td><?php echo $row['sname']; ?></td>
                            <td><?php echo $row['rate']; ?></td>
                            <td><img src="uploads/<?php echo $row['image']; ?>" width="90"></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
<?php 
          include ('includes/footer.php');
        ?>

</html>