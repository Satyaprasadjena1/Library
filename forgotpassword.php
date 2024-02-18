<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <title>Verify</title>

    <style>
        .main1 {
            margin-top: 135px;
            margin-left: 27%;
            width: 700px;
            height: 450px;
            border-radius: 15px;
            box-shadow: 15px 15px 12px #e4e4e4,
                -12px -12px 12px #fbfbfb;
        }

        body {
            background-color: #f3f3f3;
            font-family: 'Poppins',
                sans-serif;
        }

        ::placeholder {
            font-size: 20px;
        }

        input.form-control {
            border-radius: 3px;
            border-style: none;
            background-image: linear-gradient(to bottom, #dbd8d8d7, #f3f3f3);
            font-size: 15px;
            box-shadow: inset -8px -5px 12px #fcfcfc;
            width: 80%;
            height: 60px;
        }


        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: -8px -5px 30px #fcfcfc inset !important;
            box-shadow: inset -8px -5px 12px #fcfcfc;
            background-image: linear-gradient(to bottom, #dbd8d8ea, #f3f3f3);
        }
    </style>
</head>

<body>
    <div class="main1">
        <div class="container-fluid">
            <div class="row" style="justify-content: center">
                <div class="mt-5">
                    <center>
                        <h1>Find Your Accont</h1>
                        <h6><b>Please enter your email address <br>to verify your account.<b></h6>
                        <?php
                        if (empty($_SESSION['updateotp'])) {
                        ?>
                            <form method="post" action="emailverify.php">
                                <div class="input-group mb-3 mt-5">
                                    <input type="email" class="form-control" name="nemail" placeholder="Enter Your Email-Id">
                                    <div class="input-group-append ml-5">
                                        <input class="btn btn-success" name="nsubmit" type="submit" value="Send">
                                    </div>
                                </div>
                            </form>
                        <?php } else { ?>
                            <form method="post" action="emailverify.php">
                                <div class="input-group mb-3 mt-5">
                                    <label style="font-size: 20px;text-decoration:bold;margin-top:3%;">NO-</label><input type="text" class="form-control" name="notp" placeholder="Enter Your OTP" maxlength="4">
                                    <div class="input-group-append ml-5">
                                        <input class="btn btn-success" name="nosubmit" type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        <?PHP } ?>
                    </center>

                </div>


            </div>
        </div>
    </div>
</body>

</html>