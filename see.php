<html>

<head>
    <title>See More</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
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
        overflow-x: hidden;
    }

    .container {
        margin-top: 5rem
    }

    #c1 {
        margin-top: 3rem
    }

    img {
        width: 50px;
        height: 400px;
    }
    </style>
</head>
<?php 
         include ('includes/header.php');
        ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="img/acrylic1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Acrylic Nails</h5>
                        <p class="card-text">"Acrylics do not require a lamp to cure, and they're great for changing the
                            shape
                            or extending your nails," said Zuniga before adding that they're ideal for people looking to
                            change the shape of their nails or want more length.</p>
                        <a href="login.php" class="btn btn-primary">Book</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Chrome Nails</h5>
                        <p class="card-text">Chrome nails — and the many new riffs on them — show no sign of slowing
                            down. It
                            should come as no surprise, since the glossy metallic sheen is as mesmerizing as it is
                            unexpected. </p> <br>
                        <a href="login.php" class="btn btn-primary">Book</a>
                    </div>
                    <img src="img/crome1.jpeg" class="card-img-bottom" alt="...">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="img/p2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Builder Gel </h5>
                        <p class="card-text">"Builder gel is a type of nail enhancement that provides strength, length,
                            and
                            shape to the natural nails for three-plus weeks of wear."</p><br><br>
                        <a href="login.php" class="btn btn-primary">Book</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="c1">
            <div class="col-md-4">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Ombre Nails</h5>
                        <p class="card-text">Ombre nails are a popular and stylish choice for women who want to stand
                            out. Ombre
                            nail designs are a cute, classy and modern fashion statement that will take your style to
                            the
                            next level.</p>
                        <a href="login.php" class="btn btn-primary">Book</a>
                    </div>
                    <img src="img/omre1.jpg" class="card-img-top" alt="...">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="img/3D1.jpg" class="card-img-bottom" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">3D/5D Nails</h5>
                        <p class="card-text"> While the topic of Aquamarine is top of mind, may we turn your attention
                            to
                            these mermaid-inspired 3D nails? The pearls and builder gel scales take this jelly-esque
                            look over the top.</p>
                        <a href="login.php" class="btn btn-primary">Book</a>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Gel Nails</h5>
                        <p class="card-text">A gel manicure follows most of the same steps as your traditional
                            manicure—your nails are cut, filed, and shaped, cuticles are cut (if you so choose), but
                            that's where the similarities end.</p>
                        <a href="login.php" class="btn btn-primary">Book</a>
                    </div>
                </div>
                <img src="img/gel2.jpg" class="card-img-top" alt="...">
            </div>
        </div>
    </div>
</body>
<?php 
          include ('includes/footer.php');
        ?>

</html>