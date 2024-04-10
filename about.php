<html>

<head>
    <title>About Us</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.5.1.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <style>
    body {
        background-image: url(img/back6.jpg);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
    }

    h2 {
        text-align: center;
    }

    #card {
        margin-left: 13.5rem;
        background-color: rgba(255, 182, 193, 0.5);
    }

    .p2 {
        text-align: center;
        margin-left: 5rem;
        font-size: 20px;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <?php 
         include ('includes/header.php');
        ?>
    <div class="container-fluid">
        <div class="card mb-5 mt-5 col-md-8 " id="card">
            <div class="card-header">
                <h2>About US</h2>
            </div>
            <div class="card-body col-lg-11 col-md-12  mb-md-0">
                <p class="p2"> 'Nail Bug' We are an honor-winning nail salon situated in Florida. <br>
                    We pride ourselves on being nail masters and constantly refresh our abilities by contending
                    in national nail rivalries and going to preparing consistently.
                    As a 4-star gold salon, we need your salon experience to be fun, innovative, useful, and proficient.
                </p>

                <p class="p2">Our customer's state visiting the salon resembles going round to your companion's home for
                    an espresso and chinwag to complete your nails.
                    The main distinction is you will have your nails done by expert nail professionals with long periods
                    of experience.</p>

                <p class="p2">Nail Technicians in <br>

                    Nail treatment and Pedicure <br>
                    Acrylic nail augmentations <br>
                    Gel nail augmentations <br>
                </p>
            </div>
        </div>
    </div>

    <?php 
          include ('includes/footer.php');
        ?>
</body>

</html>