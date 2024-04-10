<?php 

    include 'connection_inc.php';
    require "./PHPMailer-master/src/PHPMailer.php";
    require "./PHPMailer-master/src/SMTP.php";
    require "./PHPMailer-master/src/Exception.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    if(isset($_POST['submit'])){
        $cid=$_GET['viewid'];
        $id=$_GET['id'];
        $sname=$_GET['sname'];
        $a_date=$_GET['date'];
        $status=$_POST['status'];
         $sql=mysqli_query($con,"UPDATE `appoinment_mst` SET `status`='$status' WHERE email='$cid' AND id='$id'");
         if($sql){
       

   
    function sendAppointmentNotification($to, $subject, $message) {
        // PHPMailer configuration
        $mail = new PHPMailer(true);
    
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Replace with your SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'nisthapatel1107@gmail.com'; // Replace with your SMTP username
            $mail->Password   = 'iqfo jqrp cocc kuhv'; // Replace with your SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587; // TCP port to connect to
    
            //Recipients
            $mail->setFrom("nisthapatel1107@gmail.com", "NailBug"); // Replace with your email and name
            $mail->addAddress($to); // Add recipient
    
            // Content
            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body    = $message;
    
            // Send email
            $mail->send();
            return true; // Email sent successfully
        } catch (Exception $e) {
            return "Error sending email: {$mail->ErrorInfo}";
        }
    }
    
    $to = $cid; // Replace with the recipient's email address
    
    $subject = 'Appointment Notification';
    
    if ($status == "Selected") {
        $message = "Dear User,\n\nYour appointment of $sname on $a_date has been selected.\n\nThank you.";
    } else {
        $message = "Dear User,\n\nUnfortunately, your appointment of $sname on $a_date has been rejected.\n\nPlease contact us for further assistance.\n\nThank you.";
    }

    $result = sendAppointmentNotification($to, $subject, $message);
    
    if ($result === true) {
        echo '<script>alert("Email sent successfully")</script>';
    

    } else {
        echo '<script>alert($result)</script>'; // Print the error message
    }
    }
}
?>

<html>

<head>
    <title>View Appointment page</title>
    <script src="https://kit.fontawesome.com/9524e50535.js" crossorigin="anonymous"></script>
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
        background: white;
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
                <!-- <li><a href=""><span class="fa-solid fa-database"></span>
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
                    <h1>View Appoinment</h1>
                </div>
                <div class="card-body">
                    <div class="table table-bordered table-striped">
                        <?php 
                            $cid=$_GET['viewid'];
                            $id=$_GET['id'];
                           $ret=mysqli_query($con,"SELECT * FROM user_register,appoinment_mst WHERE user_register.email='$cid' AND appoinment_mst.id='$id'");
                            while ($row=mysqli_fetch_array($ret)){
                       ?>
                        <table class='table table-bordered'>
                            <tr>
                                <th>Name :</th>
                                <td><?php echo $row['uname'] ?></td>
                            </tr>
                            <tr>
                                <th>Email :</th>
                                <td><?php echo $row['email'] ?></td>
                            </tr>
                            <tr>
                                <th>Contact :</th>
                                <td><?php echo $row['contact'] ?></td>
                            </tr>
                            <tr>
                                <th>Service :</th>
                                <td><?php echo $row['sname'] ?></td>
                            </tr>
                            <tr>
                                <th>Apponintment Date and Time :</th>
                                <td><?php echo $row['a_date'] ?></td>
                            </tr>
                            <tr>
                                <th>Status :</th>
                                <td><?php 
                                            if($row['status']==""){
                                                echo "Not Updated yet";
                                            }
                                            if($row['status']=="Selected"){
                                                echo "Selected";
                                            }
                                            if($row['status']=="Rejected"){
                                                echo "Rejected";
                                            }
                                    ?></td>
                            </tr>
                        </table>
                        <table class="table table-bordered">
                            <?php if($row['status']==""){ ?>
                            <form method="POST">
                                <tr>
                                    <th>Status :</th>
                                    <td>
                                        <select name="status" class="form-control wd-450" required="true">
                                            <option value="Selected" selected="true">Selected</option>
                                            <option value="Rejected">Rejected</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr align='center'>
                                    <td colspan='2'>
                                        <button type="submit" name="submit" class='btn btn-success'>Submit</button>
                                    </td>
                                </tr>
                            </form>
                            <?php } else { ?>
                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th>Status</th>
                                <td><?php echo $row['status']; 
                                 
                                ?></td>
                            </tr>
                        </table>
                        <?php }?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>