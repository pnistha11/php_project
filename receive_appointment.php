<?php
    include 'connection_inc.php';
    $sql="SELECT * FROM `appoinment_mst`";
    $res=mysqli_query($con,$sql);
    // if(isset($_POST['submit'])){
    //   $email=$_POST['email'];
    //   $sname=$_POST['sname'];
    //   $date=$_POST['a_date'];
    // }
    $sql = "SELECT MONTH(a_date) AS month, COUNT(*) AS appointments 
    FROM `appoinment_mst` 
    GROUP BY MONTH(a_date)
    ORDER BY MONTH(a_date)";
$result = mysqli_query($con, $sql);

// Process the data for chart rendering
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[$row['month']] = $row['appointments'];
}
    
?>

<html>

<head>
    <title>Admin Panel</title>
    <script src="https://kit.fontawesome.com/9524e50535.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="style1.css"> -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.5.1.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    :root {
        --main-color: lightgray;
        --color-dark: #1D2231;
        --text-gray: #8390A2;
    }

    * {
        font-family: 'Poppins', sans-serif;
    }

    h2 {
        font-weight: bold;
        font-size: 40px;
        color: mediumvioletred;
    }

    ul {
        list-style-type: none;
    }

    .sidebar {
        width: 300px;
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        background: var(--main-color);
        z-index: 100;
        transition: 'width'300ms;
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
        padding-left: 0.0rem;
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
        text-align: center;
    }

    #nav-toggle:checked+.sidebar .sidebar-brand h2 span:last-child,
    #nav-toggle:checked+.sidebar li a span:last-child {
        display: none;
    }

    #nav-toggle:checked~.main-content {
        margin-left: 90px;
    }

    #nav-toggle:checked~.main-content header {
        width: calc(100% - 80px);
        left: 90px;
    }

    .main-content {
        transition: 'margin-left'300ms;
        margin-left: 300px;
    }

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
        font-size: 1.5rem
    }

    .search-wrapper input {
        height: 100%;
        padding: .5rem;
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

    .card {
        margin-top: 3rem;
        background: lightgray;
        border-radius: 5px;
    }

    .card-header,
    .card-body {
        padding: 1rem
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #f0f0f0;
    }

    .card-header button,
    a {
        /* background: var(--main-color);
        border-radius: 5px; */
        color: lavender;
        font-size: .8rem;
        padding: .5rem 1rem;
        /* border: 1px solid var(--main-color); */
    }

    @media only screen and (max-width:1200) {
        .sidebar {
            width: 90px;
        }

        .sidebar .sidebar-brand h2 span,
        .sidebar li a {
            padding-left: 0rem;
            text-align: center;
        }

        .sidebar li a {
            padding-left: 0rem;
        }

        .sidebar .sidebar-brand h2 span:last-child,
        .sidebar li a span:last-child {
            display: none;
        }

        .main-content {
            margin-left: 90px;
        }

        .main-content header {
            width: calc(100% - 90px);
            left: 90px;
        }
    }

    @media only screen and (max-width:768px) {
        .cards {
            grid-template-columns: 100%;
        }
    }

    table {
        width: 100%;
        background: lightgray;
        border-radius: 10px;
    }

    th,
    td {
        border-bottom: 1px solid #ddd;
    }

    #b {
        background: mediumvioletred;
        border-radius: 5px;
        color: lightgray;
        font-size: .8rem;
        padding: .5rem 1rem;
        border: 1px solid var(--main-color);
    }

    a:hover {
        color: mediumvioletred;
        text-decoration: none;
        cursor: pointer;
    }

    #li {
        color: mediumvioletred;
        font-size: 25px
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
                <li><a href="dashboard.php"><span class="fa-solid fa-house"></span>
                        <span>Dashboard</span></a>
                </li>
                <li><a href="employee.php"><span class="fa-solid fa-user-group"></span>
                        <span>Employee</span></a>
                </li>
                <li><a href="customer.php"><span class="fa-solid fa-user"></span>
                        <span>Customer</span></a>
                </li>
                <li><a href="receive_appointment.php" class="active"><span class="fa-solid fa-calendar-check"></span>
                        <span>Appoinment</span></a>
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
            <div class="card">
                <div class="card-header">
                    <h1>Appoinment Details</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover ">
                        <?php 
                                    if(mysqli_num_rows($res) >0){
                                    ?>
                        <thead>
                            <tr>
                                <!-- <th>User Id</th> -->
                                <th>User Name</th>
                                <th>Service Name</th>
                                <th>Date & Time</th>
                                <th>Status</th>
                                <th width='15%'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                    $i=1;
                                    while($row=mysqli_fetch_array($res)) {  
                                       ?>
                            <tr>
                                <!-- <td> <?php echo $row['uid']?> </td> -->
                                <td> <?php echo $row['email']?></td>
                                <td> <?php echo $row['sname']?></td>
                                <td> <?php echo $row['a_date']?></td>
                                <?php if($row['status']==""){ ?>
                                <td><?php echo "Not Updated Yet"; ?></td>
                                <?php } else { ?>
                                <td><?php  echo $row['status'];?></td><?php } ?>
                                <td>
                                    <a id="b"
                                        href="view_appoinment.php?viewid=<?php echo $row['email'];?>&id=<?php echo $row['id'];?>&date=<?php echo $row['a_date'];?>&sname=<?php echo $row['sname'];?>"><i
                                            class='fa-solid fa-pen-to-square'></i></a>
                                    <a id="b" href="delete.php?un=<?php echo $row['email'];?>"
                                        onClick="return confirm('Are you sure you want to delete?')"><i
                                            class='fa fa-trash'></i></a>
                                </td>
                            </tr> <?php 
                                                        // $cnt=$cnt+1;
                                                        }?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <div style="width: 400px;margin: auto;">
                        <canvas id="appointmentChart"></canvas>
                    </div>
                    <script>
                    // Use PHP to pass appointment data to JavaScript for chart rendering
                    var data = <?php echo json_encode($data); ?>;
                    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                        'October', 'November', 'December'
                    ];

                    // Prepare data for Chart.js
                    var labels = [];
                    var values = [];
                    for (var month in data) {
                        labels.push(months[month - 1]);
                        values.push(data[month]);
                    }

                    // Render pie chart using Chart.js
                    var ctx = document.getElementById('appointmentChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Appointments by Month',
                                data: values,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.5)',
                                    'rgba(54, 162, 235, 0.5)',
                                    'rgba(255, 206, 86, 0.5)',
                                    'rgba(75, 192, 192, 0.5)',
                                    'rgba(153, 102, 255, 0.5)',
                                    'rgba(255, 159, 64, 0.5)',
                                    'rgba(255, 99, 132, 0.5)',
                                    'rgba(54, 162, 235, 0.5)',
                                    'rgba(255, 206, 86, 0.5)',
                                    'rgba(75, 192, 192, 0.5)',
                                    'rgba(153, 102, 255, 0.5)',
                                    'rgba(255, 159, 64, 0.5)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true
                        }
                    });
                    </script>

                </div>
            </div>
        </main>
    </div>
</body>

</html>