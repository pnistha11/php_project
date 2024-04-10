<html>

<head>
    <title>Greeting Page</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.5.1.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/9524e50535.js" crossorigin="anonymous"></script>
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

    .c1 {
        margin-top: 5rem;
        margin-bottom: 5rem;
        margin-left: 25rem;
        background-color: rgba(140, 217, 173, 0.5);
        /* background: rgb(140, 217, 173) */
    }

    p {
        font-size: 18px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="card c1" align="center" style="width: 18rem;">
            <img src="img/pay.png" class="card-img-top" alt="...">
            <div class="card-body">
                <!-- <h5 class="card-title">Card title</h5> -->
                <p class="card-text">Hooray! You have completed your payment.</p>
                <p>Transaction Id:<?php echo $_GET['tid'];?> <span></span></p>
                <p>Payed by Debit Card</p>
                <a href="user_index.php" class="btn btn-success">Continue</a>
            </div>
        </div>
    </div>
</body>

</html>