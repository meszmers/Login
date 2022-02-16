<?php
session_start();
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Website</title>
    <style>

        body {

            background-image:  url('images/background.jpg');
            max-width: 500px;
            margin: auto;;
        }

        button, a {
            background-color: #f4511e;
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            font-size: 16px;
            margin: 4px 2px;
            opacity: 0.6;
            transition: 0.3s;
            display: inline-block;
            text-decoration: none;
            cursor: pointer;
            border-radius: 15px;
        }
        .LoginGroup {
            border-radius: 30px;
            background-color: #000000;
            padding: 16px 32px;


        }
        form {
            text-align: center;

        }
        h4, p {
            text-align: center;
            color: white;
        }

        .LoginTopButtons {
            text-align: right;
        }



        button:hover {opacity: 1}
        a:hover {opacity: 1}

    </style>
</head>

<body>
<nav>
    <ul>
        <?php
        if (isset($_SESSION['userid'])) {
            ?>
            <li><a href="#">Welcome, <?php echo $_SESSION['useruid']; ?></a></li>
            <li><a href="includes/logout.inc.php">LOGOUT</a></li>
            <?php echo "You logged in! ";
        } else {
            ?>
                <div class="LoginTopButtons">
            <a href="#">SIGN UP</a> <a href="#">LOGIN</a>
            </div>
            <?php

        }
        ?>
    </ul>
</nav>

<?php if (isset($_SESSION['userid']) == false) : ?>
    <section>
        <div class="LoginGroup">

            <div>
                <h4>LOGIN</h4>

            </div>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="uid" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <br>
                <button type="submit" name="submit">LOGIN</button>
            </form>


            <div>
                <p> Don't have account yet? Sign up here!</p>
                <form action="includes/signup.inc.php" method="post">
                    <input type="text" name="uid" placeholder="Username">
                    <br>
                    <input type="password" name="pwd" placeholder="Password">
                    <br>
                    <input type="password" name="pwdRepeat" placeholder="Repeat password">
                    <br>
                    <input type="text" name="email" placeholder="E-mail">
                    <br>
                    <button type="submit" name="submit">SIGN UP</button>
                </form>

    </section>
    </div>
<?php endif ?>
</body>
</html>