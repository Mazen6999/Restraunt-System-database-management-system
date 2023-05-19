<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login || Code Camp BD</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel='stylesheet prefetch'
        href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="css/login.css">

    <style type="text/css">
        #buttn {
            color: #fff;
            background-color: #5c4ac7;
        }
    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>


<body>
    <div style=" background-image: url('images/img/pimg.jpg'); background-repeat: no-repeat; ">
        <?php
        include("connection/connect.php");
        error_reporting(0);
        session_start();
        if (isset($_POST['submit'])) {
            $table_id = $_POST['table_id'];

            if (!empty($_POST["submit"])) {
                $loginquery = "SELECT * FROM tables WHERE table_id='$table_id' AND  status = 'Available'"; //selecting matching records
                $result = mysqli_query($db, $loginquery); //executing
                $row = mysqli_fetch_array($result);

                if (is_array($row)) {
                    $_SESSION["table_id"] = $row['table_id'];
                    $sql = mysqli_query($db, "update tables set status='Taken' where table_id='$table_id' ;");
                    header("refresh:1;url=welcome.php?category_id='$table_id'");
                } else {
                    $message = "Invalid Table Number!";
                }
            }
        }
        ?>
        <br><br><br><br><br><br><br>

                <div class="module form-module">
                        <div class="toggle">

                        </div>
                    <div class="form">
                        <h2>Enter Table Number</h2>
                        <span style="color:red;">
                            <?php echo $message; ?>
                        </span>
                        <span style="color:green;">
                            <?php echo $success; ?>
                        </span>
                        <form action="" method="post">
                            <input type="text" placeholder="Table Number" name="table_id" />

                            <input type="submit" id="buttn" name="submit" value="Order" />
                        </form>
                    </div>
                    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                    
                </div>
                <br><br><br><br><br><br><br><br><br><br><br><br>
            </body>

</html>