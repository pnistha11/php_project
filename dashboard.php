<?php 
    include 'connection_inc.php';
    $sql1 = "SELECT SUM(amount) AS total_payment FROM payment";
    $res = mysqli_query($con,$sql1);
    $sql = "SELECT MONTH(registration_date) AS month, COUNT(*) AS registrations FROM `user_register` GROUP BY MONTH(registration_date)";
    $result = mysqli_query($con,$sql);

    $data = array_fill(1, 12, 0); 
    while ($row = $result->fetch_assoc()) {
        $data[$row['month']] = $row['registrations'];
    }
    $paymentsData = array_fill(1, 12, 0);
    $paymentsSql = "SELECT MONTH(payment_date) AS month, SUM(amount) AS total_payment FROM payment GROUP BY MONTH(payment_date)";
    $paymentsResult = $con->query($paymentsSql);
    while ($row = $paymentsResult->fetch_assoc()) {
        $paymentsData[$row['month']] = $row['total_payment'];
    }
 ?>
<html>

<head>
    <title>Admin Panel</title>
    <script src="https://kit.fontawesome.com/9524e50535.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.5.1.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="bootstrap.min.js"></script>


    <style>
    :root {
        --main-color: lightgray;
        --color-dark: #1d2231;
        --text-gray: #8390a2;
    }

    * {
        font-family: "Poppins", sans-serif;
    }

    h2 {
        font-weight: bold;
        font-size: 40px;
        color: mediumvioletred;
    }

    ul {
        list-style-type: none;
    }

    a:hover {
        color: mediumvioletred;
        text-decoration: none;
        cursor: pointer;
    }

    .sidebar {
        width: 300px;
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        background: var(--main-color);
        z-index: 100;
        transition: "width"300ms;
    }

    .sidebar-brand {
        height: 90px;
        padding: 1rem 0rem 1rem 2rem;
        color: mediumvioletred;
    }

    .sidebar-brand span {
        display: inline-block;
        padding-right: 1rem;
    }

    .sidebar-menu {
        margin-top: 1rem;
    }

    .sidebar-menu li {
        width: 100%;
        margin-bottom: 1.7rem;
        padding-left: 0rem;
    }

    .sidebar-menu a {
        padding-left: 1rem;
        display: block;
        color: mediumvioletred;
        font-size: 1.1rem;
    }

    .sidebar-menu a.active {
        background: mediumvioletred;
        padding-top: 1rem;
        padding-bottom: 1rem;
        color: var(--main-color);
        border-radius: 30px 0px 0px 30px;
    }

    .sidebar-menu a span:first-child {
        font-size: 1.5rem;
        padding-right: 1rem;
    }

    #nav-toggle:checked+.sidebar {
        width: 90px;
    }

    #nav-toggle:checked+.sidebar .sidebar-brand h2 span,
    #nav-toggle:checked+.sidebar li a {
        padding-left: 0rem;
        text-align: center;
    }

    #nav-toggle:checked+.sidebar li a {
        padding-left: 0rem;
    }

    #nav-toggle:checked+.sidebar .sidebar-brand h2 span:last-child,
    #nav-toggle:checked+.sidebar li a span:last-child {
        display: none;
    }

    #nav-toggle:checked~.main-content {
        margin-left: 90px;
    }

    #nav-toggle:checked~.main-content header {
        width: calc(100% - 90px);
        left: 90px;
    }

    .main-content {
        transition: "margin-left"300ms;
        margin-left: 300px;
    }

    /* copy from here */
    header {
        background: #fff;
        display: flex;
        justify-content: space-between;
        padding: 1.5rem 1.5rem;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        position: fixed;
        left: 300px;
        width: calc(100% - 300px);
        top: 0;
        z-index: 100;
        transition: left 300ms;
    }

    #nav-toggle {
        display: none;
    }

    header h1 {
        color: #222;
    }

    header label span {
        font-size: 1.7rem;
        padding-right: 1rem;
    }

    .search-wrapper {
        border: 1px solid #ccc;
        border-radius: 30px;
        height: 50px;
        display: flex;
        align-items: center;
        overflow-x: hidden;
    }

    .search-wrapper span {
        display: inline-block;
        padding: 0rem 1rem;
        font-size: 1.5rem;
    }

    .search-wrapper input {
        height: 100%;
        padding: 0.5rem;
        border: none;
        outline: none;
    }

    .user-wrapper {
        display: flex;
        align-items: center;
    }

    .user-wrapper img {
        border-radius: 50%;
        margin-right: 1rem;
    }

    .user-wrapper h4 {
        margin-right: 1rem;
    }

    .user-wrapper small {
        display: inline-block;
        color: var(--text-gray);
    }

    main {
        margin-top: 110px;
        padding: 2rem 1.5rem;
        background: #f1f5f9;
        min-height: calc(100vh - 90px);
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 2rem;
        margin-top: 1rem;
    }

    .card-single {
        display: flex;
        justify-content: space-between;
        background: lightgray;
        padding: 2rem;
        border-radius: 10px;
    }

    .card-single div:last-child span {
        font-size: 3rem;
        color: mediumvioletred;
    }

    .card-single div:first-child span {
        color: var(--text-black);
    }

    /* .card-single:last-child {
            background: mediumvioletred;
        }

        .card-single:last-child h1,
        .card-single:last-child div:first-child span,
        .card-single:last-child div:last-child span {
            color: #fff;
        } */

    .card-single:hover {
        color: mediumvioletred;
    }

    /* customer card */
    .card {
        margin-top: 3rem;
        background: #fff;
        border-radius: 5px;
    }

    #li {
        color: mediumvioletred;
        font-size: 25px
    }

    .charts-container {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    canvas {
        margin-right: 10px;
    }
    </style>
</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="fa-solid fa-naira-sign"></span><span>Nail Bug</span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="" class="active"><span class="fa-solid fa-house"></span>
                        <span>Dashboard</span></a>
                </li>
                <li><a href="employee.php"><span class="fa-solid fa-user-group"></span>
                        <span>Employee</span></a>
                </li>
                <li><a href="customer.php"><span class="fa-solid fa-user"></span>
                        <span>Customer</span></a>
                </li>
                <li><a href="receive_appointment.php"><span class="fa-solid fa-calendar-check"></span>
                        <span>Appoinment</span></span></a>
                </li>
                <li><a href="services.php"><span class="fa-solid fa-circle-info"></span>
                        <span>Services</span></a>
                </li>
                <!-- <li><a href="admin_payment.php"><span class="fa-solid fa-credit-card"></span>
                        <span>Payment</span></a>
                </li> -->
                <li><a href="invoice.php"><span class="fa-solid fa-receipt"></span>
                        <span>Invoice</span></a>
                </li>
                <!-- <li><a href="#"><span class="fa-solid fa-database"></span>
                        <span>Backup Database</span></a>
                </li> -->
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <div class="header-title">
                <h1>
                    <label for="nav-toggle">
                        <span class="fa-solid fa-bars"></span>
                    </label>
                    Dashboard
                </h1>
            </div>
            <!-- <div class="search-wrapper">
                <span class="fa-solid fa-magnifying-glass"></span>
                <input type="search" placeholder="Search here" \>
            </div> -->
            <div class="user-wrapper">
                <img src="img/female.webp" width="40px" height="40px" alt="">
                <h4>
                    <?php
                                if(isset($_COOKIE['uname'])){
                                    echo $_COOKIE['uname'];
                                }
                            ?>
                </h4>
                <small style="color:mediumvioletred">Super Admin</small>
                <a id="li" class="nav-link" href="logout1.php"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>

        </header>
        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1><?php 
                                    $query1=mysqli_query($con,"Select * from `user_register`");
                                    $totalcust=mysqli_num_rows($query1);
                                ?>
                            <?php echo $totalcust; ?>
                        </h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <span class="fa-solid fa-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1><?php 
                                    $query2=mysqli_query($con,"Select * from  `services`");
                                    $totalser=mysqli_num_rows($query2);
                                ?>
                            <?php echo $totalser; ?>
                        </h1>
                        <span>Services</span>
                    </div>
                    <div>
                        <span class="fa-solid fa-clipboard-list"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1><?php if ($res->num_rows > 0) {
                            $row = $res->fetch_assoc();
                            $totalPayment = $row["total_payment"];
                            echo  number_format($totalPayment, 2);
                            }?></h1>
                        <span>Income</span>
                    </div>
                    <div>
                        <span class="fa-solid fa-coins"></span>
                    </div>
                </div>
            </div><br> <br><br>
            <canvas id="userRegistrationsChart" width="1000" height="300"></canvas> <br><br>
            <canvas id="paymentsChart" width="1000" height="500"></canvas>
            <script>
            var ctx = document.getElementById('userRegistrationsChart').getContext('2d');
            var data = <?php echo json_encode(array_values($data)); ?>;
            var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October',
                'November', 'December'
            ];

            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'User Registrations by Month',
                        data: data,
                        backgroundColor: 'mediumvioletred',
                        borderColor: 'mediumvioletred',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Number of Registrations'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
                            }
                        }
                    }
                }
            });
            var ctx2 = document.getElementById('paymentsChart').getContext('2d');
            var paymentsData = <?php echo json_encode(array_values($paymentsData)); ?>;

            var paymentsChart = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Payments by Month',
                        data: paymentsData,
                        fill: false,
                        borderColor: 'rgba(199, 21, 133, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Total Payments'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
                            }
                        }
                    }
                }
            });
            </script>

    </div>
    </main>
    </div>
</body>

</html>