<?php
session_start();

if ($_POST["page"] == "login") { // begin login validation
   process();
}

elseif ($_POST["page"] == "signup") { // send user to signup page
    signup();  
}

else {
    login(); // print out login page
}

function login()
{
print <<<LOGIN
<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dingl Welcome</title>

    <!-- Bootstrap Core CSS -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/the-big-picture.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="./css/welcome.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h1>
                    <span id="welcome">Welcome To</span> <br>
                    <span id="new">Your New</span><br>
                    <span id="welcome">Happy Place</span><br>
                </h1>
                <h1>
                    <span id="by"><em>by D &amp; J Developers</em></span>
                </h1>
                <form method="post" action="$script">    
                    <table class = "login" width="300px">
                        <tr>
                            <td class="col1"> User Name </td> <td> <input type="text" name="user" value="" size="30"/></td>
                        </tr>
                        <tr class="rowv1">
                            <td class="col1">Password </td> <td> <input type="password" name="pwd" value="" size="30"/></td>
                        </tr>
                        <tr class="rowv1">
                            <td><button class="btn1" type="submit" value="login" name="page"/>Open Stall</td>
                            <td><button class="btn1" type="reset" value="Reset" />Reset</td>
                        </tr>
                    </table>
                </form>
                <form method="post" action="$script">
                    <button class="btn2" type="submit" value="signup" name="page"/>New to Dingl? Click here and achieve restroom nirvana.</td>
                </form>
            </div>
            <div>

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
LOGIN;

    if ($_SESSION["loggedout"] && !$_SESSION["invalid"]) {
        session_destroy();
        session_write_close();
    }
}

function process()
{
    extract ($_POST);
    $user = $_POST["user"];
    $pwd = $_POST["pwd"];
    $script = $_SERVER['PHP_SELF'];

    $user = trim($user);
    $pwd = trim($pwd);

    $validLogin = false;
    $inFile = fopen("./dbase/passwd.txt", "r");
    if ($inFile) {
        while (($line = fgets($inFile)) !== false) {
            $data = preg_split('/:/', $line);
            $data[0] = trim($data[0]);
            $data[1] = trim($data[1]);
            if (($data[0] == $user) && ($data[1] == $pwd)){
                $validLogin = true;
            }
        }
    }
    else {
        ;
    }
    
    if ($validLogin){
        setcookie("loggedinjgdqt", "true", time() + (60 * 30), "/"); //set cookie for 30 min
        $_SESSION["loggedout"] = false;
        $_SESSION["invalid"] = false;
        header('Location: index.php');
    }
    else {
        $_SESSION["invalid"] = true;
        login();
        echo '<script language="javascript">';
        echo 'alert("Invalid username/password combination.")';
        echo '</script>';
    }


}

function signup() {
    header("Location: signup.php");
}

?>