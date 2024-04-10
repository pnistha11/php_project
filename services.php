<?php
    include 'connection_inc.php';
    if(isset($_POST['add'])){
        $sname=$_POST["sname"];
        $rate=$_POST['rate'];

        // Check if file is uploaded
        if(isset($_FILES['image'])){
            $image = $_FILES['image']['name'];
            $image_size = $_FILES['image']['size'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_folder = 'uploads/'.$image;

            // Check if service name already exists
            $select_service_name = mysqli_query($con, "SELECT sname FROM `services` WHERE sname = '$sname'") or die('query failed');
            if(mysqli_num_rows($select_service_name) > 0){
                $message[] = 'Service name already added';
            }else{
                $insert_service_query = mysqli_query($con, "INSERT INTO `services`(sname, rate, image) VALUES('$sname', '$rate', '$image')") or die('query failed');
                
                if($insert_service_query){
                    if($image_size > 2000000){
                        $message[] = 'Image size is too large';
                    }else{
                        move_uploaded_file($image_tmp_name, $image_folder);
                        $message[] = 'Product added successfully!';
                    }
                }else{
                    $message[] = 'Product could not be added!';
                }
            }
        }else{
            $message[] = 'No image uploaded';
        }
    }
    // delete
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $delete_image_query = mysqli_query($con, "SELECT image FROM `services` WHERE id = '$delete_id'") or die('query failed');
        $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
        unlink('uploaded_img/'.$fetch_delete_image['image']);
        mysqli_query($con, "DELETE FROM `service` WHERE id = '$delete_id'") or die('query failed');
        header('location:services.php');
     }
    //  update
    if(isset($_POST['update'])){
        $update_p_id = $_POST['update_p_id'];
        $update_sname = $_POST['update_sname'];
        $update_rate = $_POST['update_rate'];
    
        // Update other fields
        mysqli_query($con, "UPDATE `services` SET sname = '$update_sname', rate = '$update_rate' WHERE id = '$update_p_id'") or die('query failed');
    
        if(isset($_FILES['image'])){
            $image = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_folder = 'uploads/'.$image;
    
            // Update image field in the database
            mysqli_query($con, "UPDATE `services` SET image = '$image' WHERE id = '$update_p_id'");
    
            // Move uploaded image to the destination folder
            move_uploaded_file($image_tmp_name, $image_folder);
        }
        header('location:services.php');
    }
    
    
?>
<html>

<head>
    <meta name="viewreport" content="width-device-width,intial-scale=1,maximum-scale=1">
    <title>Admin Panel</title>
    <script src="https://kit.fontawesome.com/9524e50535.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="style1.css"> -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.5.1.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <!-- <script>
    $(document).on('click', '#edit', function() {
        var id = $(this).data('id');
        // var name = $(this).data('name');
        var rate = $(this).data('rate');

        $('#id').val(id);
        // $('#name').val(name);
        $('#rate').val(rate);
    });
    </script> -->
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

    .cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 2rem;
        margin-top: 1rem;
    }

    /* services card */
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
        color: mediumvioletred;
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
                <li><a href="receive_appointment.php"><span class="fa-solid fa-calendar-check"></span>
                        <span>Appoinment</span></a>
                </li>
                <li><a href="#" class="active"><span class="fa-solid fa-circle-info"></span>
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
            <!-- Insert -->
            <div class="modal fade" id="insert" tabindex="-1" aria-labelledby="insertLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="insertLabel">Add new service</h5>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="sname">Service name :</label>
                                    <input type="text" class="form-control" name="sname"
                                        placeholder="Enter Service name.." required>
                                </div>
                                <div class="form-group">
                                    <label for="rate">Rate :</label>
                                    <input type="text" class="form-control" name="rate" placeholder="Enter Rate.."
                                        required>
                                </div>
                                <div class="form-control">
                                    <input type="file" name="image" required class="custom-file">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="add" class="btn btn-success">Save Data</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
            $(document).on('click', '.edit', function() {
                // var id = $(this).data('id');
                var id = $(this).data('id');
                var rate = $(this).data('rate');
                var sn = $(this).data('sn');

                // Set the values in the form fields
                $('[name="update_p_id"]').val(id);
                $('[name="update_rate"]').val(rate);
                $('[name="update_sname"]').val(sn);
                // Show the update modal
                $('#s1').modal('show');
            });
            </script>
            <!-- View Service -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>View Services</h3>
                                <button type="button" class="btn" id="b" data-bs-toggle="modal"
                                    data-bs-target="#insert">
                                    Add
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="tabletable-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Service Name</th>
                                            <th>Rate</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $select_service = mysqli_query($con, "SELECT * FROM `services`") or die('query failed');
                                            if(mysqli_num_rows($select_service) > 0){
                                                while($fetch_service = mysqli_fetch_assoc($select_service)){
                                        ?>
                                        <tr>
                                            <td><?php echo $fetch_service['id']; ?></td>
                                            <td><?php echo $fetch_service['sname']; ?></td>
                                            <td><?php echo $fetch_service['rate']; ?></td>
                                            <td><img src="uploads/<?php echo $fetch_service['image']; ?>" width="90">
                                            </td>
                                            <td>
                                                <a href='#'
                                                    onclick="document.getElementById('s1').style.display='block'"
                                                    class="edit btn btn-success"
                                                    data-id='<?php echo $fetch_service['id'];?>'
                                                    data-rate='<?php echo $fetch_service['rate'];?>'
                                                    data-sn='<?php echo $fetch_service['sname'];?>'>update</a>
                                                <a href="services.php?delete=<?php echo $fetch_service['id']; ?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('delete this product?');">delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        }else{
                                            echo '<p class="empty">no products added yet!</p>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Update service -->
            <div class="modal" id="s1" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateLabel">Update Service</h5>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                        </div>
                        <div class="modal-body">

                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <input type="hidden" name="update_p_id" id="nistha">

                                    <label for="sname">Service name :</label>
                                    <input type="text" class="form-control" name="update_sname"
                                        placeholder="Enter Service name.." 8 required>
                                </div>
                                <div class="form-group">
                                    <label for="rate">Rate :</label>
                                    <input type="text" class="form-control" name="update_rate"
                                        placeholder="Enter Rate.." required>
                                </div>
                                <div class="form-control">
                                    <input type="file" name="image" required class="custom-file">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="update" class="btn btn-success">Save Data</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>