<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="bootstrap.min.css">
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

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .c1 {
        position: absolute;
        top: 9rem;
        left: 10rem;
        transform: translate(-50, -50);
        width: 1000px;
        height: 500px;
        background: #f5f5f5;
        box-shadow: 0 30px 50px #dbdbdb;
        margin-bottom: 20%;
    }

    .c1 .slide .item {
        width: 200px;
        height: 300px;
        position: absolute;
        top: 50%;
        transform: translate(0, -50%);
        border-radius: 20px;
        box-shadow: 0 30px 50px #505050;
        background-position: 50% 50%;
        background-size: cover;
        display: inline-block;
        transition: 0.5s;
    }

    .slide .item:nth-child(1),
    .slide .item:nth-child(2) {
        top: 0;
        left: 0;
        transform: translate(0, 0);
        border-radius: 0;
        width: 100%;
        height: 100%;
    }

    .slide .item:nth-child(3) {
        left: 50%;
    }

    .slide .item:nth-child(4) {
        left: calc(50% + 220px);
    }

    .slide .item:nth-child(5) {
        left: calc(50% + 440px);
    }

    /* here n = 0,1,2,3,4,... */
    .slide .item:nth-child(n + 6) {
        left: calc(50% + 660px);
        opacity: 0;
    }

    .item .content {
        position: absolute;
        top: 50%;
        left: 100px;
        width: 300px;
        text-align: left;
        /* background-color: rgb(228, 196, 155, 0.3); */
        color: #eee;
        transform: translate(0, -50%);
        font-family: system-ui;
        display: none;
    }

    .slide .item:nth-child(2) .content {
        display: block;
    }

    .content .name {
        font-size: 40px;
        text-transform: uppercase;
        font-weight: bold;
        opacity: 0;
        animation: animate 1s ease-in-out 1 forwards;
    }

    .content .des {
        margin-top: 10px;
        margin-bottom: 20px;
        opacity: 0;
        animation: animate 1s ease-in-out 0.3s 1 forwards;
    }

    .content button {
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        opacity: 0;
        animation: animate 1s ease-in-out 0.6s 1 forwards;
    }

    @keyframes animate {
        from {
            opacity: 0;
            transform: translate(0, 100px);
            filter: blur(33px);
        }

        to {
            opacity: 1;
            transform: translate(0);
            filter: blur(0);
        }
    }

    .button {
        width: 100%;
        text-align: center;
        position: absolute;
        bottom: 20px;
    }

    .button button {
        width: 40px;
        height: 35px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        margin: 0 5px;
        border: 1px solid black;
        transition: 0.3s;
    }

    .button button:hover {
        background: #ababab;
        color: #fff;
    }
    </style>
</head>
<?php 
         include ('includes/header.php');
        ?>

<body>
    <br><br><br><br>
    <div class="container c1">
        <div class="slide">
            <div class="item" style="background-image:url(img/gel.jpg);">
                <div class="content">
                    <div class="name">Gel</div>
                    <div class="des">Getting gel nail extensions involves painting hard gel over a natural nail and
                        curing the polish with UV light. Then, the manicurist uses a nail form, which is a sticker that
                        goes under the free edge (the tip) of the nail to extend the length of the nail. </div>
                    <a href="see.php"><button>See More</button></a>
                </div>
            </div>
            <div class="item" style="background-image:url(img/acrylic.jpeg);">
                <div class="content">
                    <div class="name">Acrylic</div>
                    <div class="des">"Acrylics do not require a lamp to cure, and they're great for changing the shape
                        or extending your nails," said Zuniga before adding that they're ideal for people looking to
                        change the shape of their nails or want more length. </div>
                    <a href="see.php"><button>See More</button></a>
                </div>
            </div>
            <div class="item" style="background-image:url(img/crome.jpeg);">
                <div class="content">
                    <div class="name">Chrome</div>
                    <div class="des">Chrome nails — and the many new riffs on them — show no sign of slowing down. It
                        should come as no surprise, since the glossy metallic sheen is as mesmerizing as it is
                        unexpected. </div>
                    <a href="see.php"><button>See More</button></a>
                </div>
            </div>
            <div class="item" style="background-image:url(img/sgel.jpeg);">
                <div class="content">
                    <div class="name">Builder Gel</div>
                    <div class="des">"Builder gel is a type of nail enhancement that provides strength, length, and
                        shape to the natural nails for three-plus weeks of wear." </div>
                    <a href="see.php"><button>See More</button></a>
                </div>
            </div>
            <div class="item" style="background-image:url(img/omre.jpeg);">
                <div class="content">
                    <div class="name">Ombre</div>
                    <div class="des">Ombre nails are a popular and stylish choice for women who want to stand out. Ombre
                        nail designs are a cute, classy and modern fashion statement that will take your style to the
                        next level.</div>
                    <a href="see.php"><button>See More</button></a>
                </div>
            </div>
            <div class="item" style="background-image:url(img/3D.jpeg);">
                <div class="content">
                    <div class="name">3D/5D Nails </div>
                    <div class="des">While the topic of Aquamarine is top of mind, may we turn your attention to these
                        mermaid-inspired 3D nails? The pearls and builder gel scales take this jelly-esque look over the
                        top.</div>
                    <a href="see.php"><button>See More</button></a>
                </div>
            </div>
        </div>
        <div class="button">
            <button class="prev"><i class="fa-solid fa-arrow-left"></i></button>
            <button class="next"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </div>
    <br><br><br><br><br><br> <br><br><br>
    <script src="app.js"></script>
</body>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php 
          include ('includes/footer.php');
        ?>

</html>