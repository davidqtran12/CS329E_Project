<?php
session_start();

if ($_POST["page"] == "signup") { // begin login validation
   validate();
}
else {
	signup();
}

function signup() {
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

    <title>Dingl Sign-Up</title>

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
                <h1 class="signupheader">
                    <span id="welcome">Start Dingling</span> <br>
                    <span id="new">Today</span><br>
                    <span id="welcome"></span><br>
                </h1>
                <h1>
                    <span id="by"><em></em></span>
                </h1>
                <form method="post" action="$script">    
                    <table class = "signup" width="300px">
                        <tr class="rowv1">
                            <td class="col2"> User Name </td> <td> <input type="text" name="user" value="" size="30"/></td>
                        </tr>
                        <tr class="rowv1">
                            <td class="col2">Password </td> <td> <input type="password" name="pwd" value="" size="30"/></td>
                        </tr>
                        <tr class="rowv1">
                            <td class="col2">Re-Enter Password </td> <td> <input type="password" name="pwd2" value="" size="30"/></td>
                        </tr>
                        <tr class="rowv1">
                            <td class="col2">Phone Number</td>
                            <td class="phone"><input type="text" name="no1" value="" size="3"/></td>
                            <td class="phone"><input type="text" name="no2" value="" size="3"/></td>
                            <td class="phone"><input type="text" name="no3" value="" size="3"/></td>
                        </tr>
                        <tr class="rowv1">
                            <td class="col2">E-mail Address</td> <td> <input type="text" name="email" value="" size="30"/></td>
                        </tr>
                        <tr class="rowv1">
                            <td class="col2">Address</td> <td> <input type="text" name="address" value="" size="30"/></td>
                        </tr>
                        <tr class="rowv1">
                            <td class="col2">City</td> <td> <input type="text" name="city" value="" size="30"/></td>
                        </tr>
                        <tr class="rowv1">
                            <td class="col2">State </td> <td> <input type="text" name="state" value="" size="30"/></td>
                        </tr>
                        <tr class="rowv1">
                            <td class="col2">Zip Code </td> <td> <input type="text" name="zip" value="" size="30"/></td>
                        </tr>
                        <tr class="rowv1">
                            <td><button class="btn1" type="submit" value="signup" name="page"/>Sign-Up</td>
                            <td><button class="btn1" type="reset" value="Reset" />Reset</td>
                        </tr>
                        <tr class = "rowv1">
                            <td><a href="./login.php">Back to Login</a></td>
                        </tr>
                    </table>
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
}

function validate() { // validates upon if username isn't in text file
	extract ($_POST);
    $id = 0;
    $date = $_SERVER['REQUEST_TIME'];
	$user = trim($_POST["user"]);
    $pwd = trim($_POST["pwd"]);
    $pwd2 = trim($_POST["pwd2"]);
    $no = trim($_POST["no1"] . $_POST["no2"] . $_POST["no3"]);
    $email = trim($_POST["email"]);
    $address = trim($_POST["address"]);
    $city = trim($_POST["city"]);
    $state = trim($_POST["state"]);
    $zip = trim($_POST["zip"]);
    $script = trim($_SERVER['PHP_SELF']);

    $linecount = 0;
    $valid = true;   
    $inFile = fopen("./dbase/passwd.txt", "r");
    if ($inFile) {
        while (($line = fgets($inFile)) !== false) {
            $data = preg_split('/:/', $line);
            $data[0] = trim($data[0]);
            $data[1] = trim($data[1]);
            $linecount++;
            if (($data[0] == $user) || ($pwd != $pwd2)) {
                $valid = false;
            }
        }
        fclose("./dbase/passwd.txt", "r");
    } else {
        ;
    }

    if ($valid) {
        setcookie("loggedinjgdqt", "true", time() + (60 * 30), "/"); //set cookie for 30 min
        $_SESSION["loggedout"] = false;
        $_SESSION["invalid"] = false;
        echo '<script language="javascript">';
        echo 'alert("Good shit.")';
        echo '</script>';
        if ($fh = fopen ("./dbase/passwd.txt", "a"))
        {
            fwrite ($fh, "$user:$pwd\n");
            fclose ($fh);
        }
        header('Location: index.php');
    }
    else {
        $_SESSION["invalid"] = true;
        signup();
        echo '<script language="javascript">';
        echo 'alert("Something is wrong.")';
        echo '</script>';
    }

    // open connection and insert data into db
    $mysql_host = "fall-2014.cs.utexas.edu";
    $mysql_user = "jg44572";
    $mysql_pwd = "k8irIR5A2g";
    $mysql_dbs = "cs329e_jg44572";
    $mysql_port = "3306";

    $mysql_table = "dinglrs";

    $connect = mysqli_connect ($mysql_host, $mysql_user, $mysql_pwd, $mysql_dbs, $mysql_port);

    if (empty($connect)) {
        die("mysqli_connect failed: " . mysqli_connect_error());
    }

    $id = $linecount; // set id to linecount
    $no = (int) $no;
    $zip = (int) $zip;

    $stmt = mysqli_prepare($connect, "INSERT INTO $table VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param ($stmt, 'idssissssi', $id, $date, $user, $pwd, $phone, $email, $address, $city, $state, $zip);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    mysqli_close($connect);
}
?>