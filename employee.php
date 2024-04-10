<?php
    include 'connection_inc.php';
    $sql="SELECT * FROM `employee_mst`";
    $res=mysqli_query($con,$sql);
    if(isset($_POST['submit'])){
        $eid=$_POST['eid'];
        $ename=$_POST['ename'];
        $doj=$_POST['doj'];
        $addr=$_POST['addr'];
        $contact=$_POST['contact'];
        $email=$_POST['email'];
        $sql="insert into `employee_mst`(eid,ename,doj,addr,contact,email) values('$eid','$ename','$doj','$addr','$contact','$email')";
        $result=mysqli_query($con,$sql);
        if($result){
            echo '<script>alert("Inserted.")</script>';
            header("location:employee.php");
          }
    }

    if(isset($_POST['sub'])){
        $eid=$_POST['eid'];
        $addr=$_POST['addr'];
        $sql="update `employee_mst` set addr='$addr' where eid='$eid'";
        $res1=mysqli_query($con,$sql);
        if($res1){
            echo "<script>alert('Updated')</script>";
            header('location="employee.php"');
        }
    }
 ?>
<html>

<head>
    <meta name="viewreport" content="width-device-width,intial-scale=1,maximum-scale=1">
    <title>Admin Panel </title>
    <script src="https://kit.fontawesome.com/9524e50535.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="style1.css"> -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.5.1.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <style>
    :root {
        --main-color: lightgray;
        --color-dark: #1D2231;
        --text-gray: #8390A2;
    }

    * {
        font-family: 'Poppins', sans-serif;
    }

    ul {
        list-style-type: none;
    }

    a:hover {
        color: mediumvioletred;
        text-decoration: none;
        cursor: pointer;
    }

    h2 {
        font-weight: bold;
        font-size: 40px;
        color: mediumvioletred;
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

    /* employee card */
    .card {
        margin-top: 1rem;
        background: lightgray;
        border-radius: 5px;
    }

    .card-header,
    .card-body {
        padding: 1rem;
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
        color: mediumvioletred;
        font-size: 1rem;
        padding: .5rem 1rem;
        /* border: 1px solid var(--main-color); */
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

    #b {
        background: mediumvioletred;
        border-radius: 5px;
        color: lightgray;
        font-size: .8rem;
        padding: .5rem 1rem;
        border: 1px solid var(--main-color);
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
                <li><a href="employee.php" class="active"><span class="fa-solid fa-user-group"></span>
                        <span>Employee</span></a>
                </li>
                <li><a href="customer.php"><span class="fa-solid fa-user"></span>
                        <span>Customer</span></a>
                </li>
                <li><a href="receive_appointment.php"><span class="fa-solid fa-calendar-check"></span>
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
            <!-- Header for employee -->
            <div class="employee">
                <div class="card">
                    <div class="card-header">
                        <h1>Employee Details</h1>
                        <button><a href="#" onclick="document.getElementById('emp').style.display='block'">Add</a><span
                                class="fa-solid fa-user-plus"></span> </button>
                        <div class="modal" id="emp">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content card" style="margin-top:40px; margin-bottom:40px">
                                    <form method="post">
                                        <div class="card-header">
                                            <h4>Add Emoployee</h4>
                                            <span onclick="document.getElementById('emp').style.display='none'">
                                                <a href="#" id="x">&times;</a>
                                            </span>
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-gruop">
                                                        <label for="ename">
                                                            <h5>Employee Name :</h5>
                                                        </label>
                                                        <input type="text" class="form-control" name="ename"
                                                            placeholder="Enter Employee Name..">
                                                    </div>
                                                </div>
                                            </div> <br>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-gruop">
                                                        <label for="doj">
                                                            <h5>Date of join :</h5>
                                                        </label>
                                                        <input type="date" class="form-control" name="doj"
                                                            placeholder="Enter Employee Doj..">
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-gruop">
                                                        <label for="addr">
                                                            <h5>Address :</h5>
                                                        </label>
                                                        <input type="text" class="form-control" name="addr"
                                                            placeholder="Enter Address..">
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-gruop">
                                                        <label for="contact">
                                                            <h5>Contact :</h5>
                                                        </label>
                                                        <input type="number" class="form-control" name="contact"
                                                            placeholder="Enter Employee Contact..">
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-gruop">
                                                        <label for="email">
                                                            <h5>Email :</h5>
                                                        </label>
                                                        <input type="text" class="form-control" name="email"
                                                            placeholder="Enter Employee Email..">
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-12" style="text-align:center">
                                                    <button type="submit" name="submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="card-body">
                            <?php 
                            if(mysqli_num_rows($res) >0){
                            ?>
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Date of join</th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $i=1;
                                            while($row=mysqli_fetch_array($res)) {  
                                            ?>
                                    <tr>
                                        <td><?php echo $row['eid'] ?></td>
                                        <td><?php echo $row['ename'] ?></td>
                                        <td><?php echo $row['doj'] ?></td>
                                        <td><?php echo $row['addr'] ?></td>
                                        <td><?php echo $row['contact'] ?></td>
                                        <td><?php echo $row['email']?></td>
                                        <td><a id="b" href='#'
                                                onclick="document.getElementById('s1').style.display='block'"><i
                                                    class='fa fa-pencil-alt'></i></a>
                                            <a id="b" href="delete.php?en=<?php echo $row['ename'] ?>"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            <div class="modal" id="s1">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content card" style="margin-top:100px">
                                        <form action="" method="post">
                                            <div class="card-header">
                                                <h3>Update Employee Details</h3>
                                                <span onclick="document.getElementById('s1').style.display='none'">
                                                    <a href="#" id="b">&times;</a>
                                                </span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-gruop">
                                                            <label for="id">
                                                                <h4>Employee ID :</h4>
                                                            </label>
                                                            <input type="text" class="form-control" name="eid"
                                                                placeholder="Enter Id..">
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-gruop">
                                                            <label for="addr">
                                                                <h4>Address :</h4>
                                                            </label>
                                                            <input type="text" class="form-control" name="addr"
                                                                placeholder="Enter Rate..">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="row">
                                                    <div class="col-12" style="text-align:center;">
                                                        <button type="submit" id="b" class="btn"
                                                            name="sub">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <?php
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>


        </main>
    </div>
</body>

</html>