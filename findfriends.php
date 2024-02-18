<?php
session_start();
if (isset($_GET['name'])) {

    include 'sidebar.php';
    include 'config/database.php';
?>
    <!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/chat-home.css">
        <title>friends</title>

        <style>
            .contnt {
                margin-top: 8%;
                background-color: #fbfbfb;
                width: 50%;
                height: 65vh;
                border-radius: 15px;
                box-shadow: 5px 5px 22px 10px #f3f3f3;
            }

            .btn.view {
                width: 70px;
                height: 30px;
                border-radius: 2%;
                font-size: 13px;
                background-color: #d9dafb;
            }

            .btn.unfriend {
                width: auto;
                height: 30px;
                border-radius: 2%;
                font-size: 13px;
                background-color: #d9dafb;
            }

            .frnd_prof_pic {
                width: 230px;
                height: 230px;
                border-radius: 50%;
                margin-left: 28.9%;
                margin-top: 3.8%;
                box-shadow: 3px 3px 6px 3px #d9dafb;
            }

            .view_prof_box {
                margin-left: 12%;
                margin-top: 7%;
                width: 40vw;
                height: 80vh;
                background-color: #fff;
                border-radius: 10px;
                animation: appear 1.5s;
                box-shadow: -15px 20px 20px #d5b2b2;
            }

            .inner_view_prof {
                background-image: url(image/view_back.jpg);
                background-size: cover;
                background-position: center;
                width: 100%;
                height: 23vh;
            }

            .view_prof_pic {

                background-color: #fff;
                width: 8vw;
                height: 18vh;
                border-radius: 50%;
            }

            .view_prof_pic_inner {

                width: 93%;
                height: 93%;
                border-radius: 50%;
            }
        </style>
    </head>

    <body>
        <div class="col-lg-12" style="position: fixed;top:16.5%;left:16.7%;">
            <div class="row">
                <div class="col-lg-3 chat" style=" background-color: #f4f4fb;box-shadow: inset -3px -5px px #bababd;height: 100vh;margin-top: -120px;">
                    <div class="mt-5 ml-5 mb-5">
                        <h4>Search</h4>
                    </div> <!-- contains all chats-->
                    <div id="scroll" style="background-color: #f4f4fb;overflow-y: auto;height: 80vh;margin-top: -10px;">
                        <!--contact name 1-->
                        <?php
                        $name = $_GET['name'];
                        $select = $connection->query("SELECT * FROM register WHERE User_Name LIKE '%$name%'");
                        $count = $select->num_rows;
                        if ($count == 0) {
                        ?>
                            <div class="col-lg-10 bg-light  contact-box text-light ml-5 mb-2 " onclick="myFunction()">
                                <div class="row">
                                    <center style="color:red">---No match found---</center>
                                </div>
                            </div>
                            <?php
                        } else {
                            while ($row = $select->fetch_assoc()) {
                            ?>
                                <div class="col-lg-10 bg-light  contact-box text-light ml-5 mb-2 " onclick="myFunction()">
                                    <div class="row">
                                        <!--chat contact's profile pic-->
                                        <div class="col-lg-2">
                                            <img class="chat-prof-pic mt-3 " src="image/party.png">
                                        </div>
                                        <!--chat content-->
                                        <div class="col-lg-10 mt-4">
                                            <span class="text-dark chat-name1"><?php echo $row['User_Name'] ?> </span><br>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <center>
                                            <div class="col-lg-2 mb-2 ">
                                                <?php
                                                $name = trim($_GET['name']);
                                                $id = $row['user_id'];
                                                ?>
                                                <a href="findfriends.php?name=<?php echo $name; ?>&viewprofile=<?php echo $id; ?>" class="btn view">view</a>
                                            </div>
                                        </center>
                                        <?php $select_friend = $connection->query("SELECT * FROM `friend_tbl` WHERE `user_id`='" . $_SESSION['user'] . "' AND `friend_id`='" . $row['user_id'] . "' OR `friend_id`='" . $_SESSION['user'] . "' AND `user_id`='" . $row['user_id'] . "'");
                                        $$count = $select_friend->num_rows;
                                        $add_frnd = $connection->query("INSERT INTO `friend_tbl`(`user_id`,`friend_id`,`friend_status`) VALUES ('" . $_SESSION['user'] . "','" . $row['user_id'] . "',1) ");
                                        $update_request = $connection->query("UPDATE `friend_tbl` SET `user_id`= '" . $_SESSION['user'] . "',`friend_id`='" . $row['user_id'] . "',`friend_status`= 2 WHERE  `friend_id` = '" . $row['user_id'] . "'");
                                        if ($count == 0) {

                                        ?>
                                            <div class="col-lg-2 offset-1  mb-2">
                                                <button class="btn view" onclick="">ADD</button>
                                            </div>
                                        <?php } {
                                        ?>
                                            <div class="col-lg-2 offset-1 mb-2">
                                                <button class="btn unfriend " onclick="<?php echo $add_frnd ?>">UNFRIEND</button>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                        <?php }
                        }
                        ?>
                    </div>
                </div>
                <?php
                if (isset($_GET['viewprofile'])) {
                    $select_profile = $connection->query("SELECT * from `register` where `user_id` = '" . $_GET['viewprofile'] . "' ");
                    $row = $select_profile->fetch_assoc();
                ?>
                    <div class="col-lg-9 chat" id="viewprof" style="background-color:#fed4d4;height: 100vh;margin-top: -120px;">
                        <div class="view_prof_box">
                            <div class="inner_view_prof">
                            </div>
                            <div class="view_prof_pic" style="margin-top: -9%;margin-left:41%;box-shadow:2px 5px #fbfbfb;">
                                <img class="view_prof_pic_inner mt-1 ml-1" src="image/avtar.png">
                            </div>
                            <div class="mt-2">
                                <center>
                                    <h4><b><?php echo $row['User_Name'] ?> </b></h4>
                                    <span>Bhubaneswar</span>
                                    <div class="mt-4">
                                        <b>Friends</b><br> <span class="">10</span>
                                    </div>
                                    <div class=" mt-5">
                                        <button class="btn view">ABOUT</button>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
            </div>



        </div>
    <?php
                } else {
                    $select_profile = $connection->query("SELECT * from `register` where `user_id` = '" . $_SESSION['user'] . "' ");
                    $row = $select_profile->fetch_assoc();
    ?>
        <div class="col-lg-9 chat" id="viewprof" style="background-color:#fed4d4;height: 100vh;margin-top: -120px;">
            <div class="view_prof_box">
                <div class="inner_view_prof">
                </div>
                <div class="view_prof_pic" style="margin-top: -9%;margin-left:41%;box-shadow:2px 5px #fbfbfb;">
                    <img class="view_prof_pic_inner mt-1 ml-1" src="image/avtar.png">
                </div>
                <div class="mt-2">
                    <center>
                        <h4><b>"Write Something"</b></h4>
                        <span>Bhubaneswar</span>
                        <div class="mt-4">
                            <b>Friends</b><br> <span class="">10</span>
                        </div>
                        <div class=" mt-5">
                            <button class="btn view">ABOUT</button>
                        </div>
                    </center>
                </div>



            </div>
        </div>
    <?php

                }
    ?>

    </div>
    </div>
    </body>

    </html>
