<?php
 include "connection_inc.php";
 if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $fb=$_POST['fb'];
    $sql= "insert into `feedback` (email,contact,fb) values('$email','$contact','$fb')";
    $res=mysqli_query($con,$sql);
    if($res){
        header('location:index.php');
    }
 }
?>
<html>

<head>
    <title>Contact Page</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="https://kit.fontawesome.com/9524e50535.js" crossorigin="anonymous"></script>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="angular.min.js"></script>
    <style>
    * {
        font-family: 'Courier New', monospace;
        font-weight: bold;
    }

    body {
        /* background-color:lavender; */
        background-image: url(img/back6.jpg);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
    }

    h2 {
        text-align: center;
    }

    #card {
        margin-top: 5rem;
        margin-bottom: 5rem;
        margin-left: 13.5rem;
        background-color: rgba(255, 182, 193, 0.5);
    }

    span {
        font-size: 1.5rem;
        justify-content: space-between
    }

    table,
    td {
        border: none;
        margin-top: 2rem;
        margin-left: 8rem;
    }

    td {
        padding: 1rem
    }

    #a {
        margin-left: 33%;
        background-color: rgba(255, 182, 193, 0.5);
    }

    #b {
        text-align: center;
        margin-left: 2%;
        margin-top: 1%;
        margin-bottom: 1%;
    }

    .font {
        text-align: center;
        font-family: 'Courier New', monospace;
        font-weight: bold;
        font-size: 30px;
        color: black;
    }

    .c1 {
        margin-left: 14.5%;
    }

    textarea {
        resize: none;
        overflow: hidden;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* rate css */
    .r1 {
        text-align: center;
        background-color: rgba(255, 182, 193, 0.5);
        display: grid;
        height: 50%;
        place-items: center;
    }

    .container {
        position: relative;
        width: 400px;
        padding: 20px 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        /* border: 1px solid #444; */
        /* background: #111; */
    }

    .container .post {
        display: none;
    }

    .container .text {
        font-size: 25px;
        font-weight: 500;
    }

    .container .edit {
        position: absolute;
        right: 10px;
        top: 5;
        font-size: 15px;
        font-weight: 500;
        cursor: pointer;
    }

    .container .edit:hover {
        text-decoration: underline;
    }

    .container .star-widget input {
        display: none;
    }

    .star-widget label {
        font-size: 40px;
        color: #444;
        padding: 10px;
        float: right;
        transition: all 0.2s ease;
    }

    input:not(:checked)~label:hover,
    input:not(:checked)~label:hover~label {
        color: #fd4;
    }

    input:checked~label {
        color: #fd4;
    }

    input#rate-5:checked~label {
        color: #fe7;
        text-shadow: 0 0 20px #952;
    }

    input#rate-1:checked~form header:before {
        content: "I just hate it 😠";
    }

    input#rate-2:checked~form header:before {
        content: "I don`t like it 😏";
    }

    input#rate-3:checked~form header:before {
        content: "It is awesome 😊";
    }

    input#rate-4:checked~form header:before {
        content: "I just like it 😎";
    }

    input#rate-5:checked~form header:before {
        content: "I just love it 😍";
    }

    .container form {
        display: none;
    }

    input:checked~form {
        display: block;
    }

    form header {
        width: 100%;
        font-size: 25px;
        color: black;
        font-weight: 500;
        margin: 5px 0 20px 0;
        text-align: center;
        transition: all 0.2s ease;
    }


    form .textarea {
        height: 100px;
        width: 100%;
        overflow: hidden;
    }

    form .textarea textarea {
        height: 100px;
        width: 100%;
        outline: none;
        border: 1px solid plum;
        background: lavenderblush;
        padding: 10px;
        font-size: 15px;
        resize: none;
    }

    form .btn {
        height: 45px;
        width: 100%;
        margin: 15px 0;
    }

    form .btn button {
        height: 100%;
        width: 100%;
        border: 1px solid #444;
        outline: none;
        font-size: 17px;
        font-weight: 500;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    form .btn button:hover {
        background: green;
    }
    </style>
</head>
<?php 
         include ('includes/header.php');
        ?>

<body>
    <div class="container-fluid">
        <div class="card col-md-8" id="card">
            <div class="card-header">
                <h2 style="font-weight:bold;">Contact Us </h2>
            </div>
            <div class="card-body">
                <form>
                    <table>
                        <tr>
                            <td><span>Address :</span> </td>
                            <td><span>890,Sector 12,Tulsi Dham,Bharuch.</span></td>
                        </tr>
                        <tr>
                            <td><span>Phone no :</span></td>
                            <td><span>+7896541236</span></td>
                        </tr>
                        <tr>
                            <td><span>Email Us :</span></td>
                            <td><span>NailBug@gmail.com</span></td>
                        </tr>
                        <tr>
                            <td><span>Time :</span></td>
                            <td><span>10:30 A.M. to 7:30 P.M.</span></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="container">

            <div class="col-md-5 r1"><br>
                <div>
                    <h2 class="font">RATE US</h2>
                </div>
                <div class="post">
                    <div class="text">Thanks for rating us!</div>
                    <div class="edit">Edit</div>
                </div>
                <div class="star-widget">
                    <input type="radio" name="rate" id="rate-5">
                    <label for="rate-5" class="fa-solid fa-star"></label>
                    <input type="radio" name="rate" id="rate-4">
                    <label for="rate-4" class="fa-solid fa-star"></label>
                    <input type="radio" name="rate" id="rate-3">
                    <label for="rate-3" class="fa-solid fa-star"></label>
                    <input type="radio" name="rate" id="rate-2">
                    <label for="rate-2" class="fa-solid fa-star"></label>
                    <input type="radio" name="rate" id="rate-1">
                    <label for="rate-1" class="fa-solid fa-star"></label>
                    <form action="#">
                        <header></header>
                        <div class="textarea">
                            <textarea cols="30" placeholder="Describe your experience.."></textarea>
                        </div>
                        <div class="btn">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form method="post">
                <div class="card c1 col-lg-4" id="a"><br>
                    <h2 class="font"><u>Feedback</u></h2>
                    <br>
                    <div class="form-group">
                        <label for="email">
                            <h2>Email : </h2>
                        </label>
                        <input type="text" name="email" style="background-color:lavenderblush;" class="form-control"
                            placeholder="Enter Email" required>
                    </div>
                    <div class="form-group">
                        <label for="cnt">
                            <h2>Contact : </h2>
                        </label>
                        <input type="number" name="contact" style="background-color:lavenderblush;" class="form-control"
                            placeholder="Enter Contact" required>
                    </div>
                    <div class="form-group">
                        <label for="fb">
                            <h2>Enter Your Feedback : </h2>
                        </label>
                        <textarea name="fb" style="background-color:lavenderblush;" class="form-control"
                            placeholder="Enter Feedback" required></textarea>
                    </div>
                    <div class="btn">
                        <button type="submit" class="btn btn-success" name="submit" id="b">Submit
                            Feedback</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
    const btn = document.querySelector("button");
    const post = document.querySelector(".post");
    const widget = document.querySelector(".star-widget");
    const editBtn = document.querySelector(".edit");

    btn.onclick = () => {
        widget.style.display = "none";
        post.style.display = "block";
        editBtn.onclick = () => {
            widget.style.display = "block";
            post.style.display = "none";
        }
        return false;

    }
    </script>
</body>
<br>
<?php 
          include ('includes/footer.php');
        ?>

</html>