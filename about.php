<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <div class="bg-container-contact100" style="background-image: url(images/bg-01.jpg);">
        <div class="contact100-header flex-sb-m">
            <a href="#" class="contact100-header-logo">
                <img src="images/icons/logo.png" alt="LOGO">
            </a>

            <div>
                <button class="btn-show-contact100">
                    Contact Us
                </button>
            </div>
        </div>
    </div>

    <div class="container-contact100">
        <div class="wrap-contact100">
            <button class="btn-hide-contact100">
                <i class="zmdi zmdi-close"></i>
            </button>

            <div class="contact100-form-title" style="background-image: url(images/bg-02.jpg);">
                <span>Contact Us</span>
            </div>

            <form class="contact100-form validate-form">
                <div class="wrap-input100 validate-input">
                    <input id="name" class="input100" type="text" name="name" placeholder="Full name">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="name">
                        <span class="lnr lnr-user m-b-2"></span>
                    </label>
                </div>


                <div class="wrap-input100 validate-input">
                    <input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="email">
                        <span class="lnr lnr-envelope m-b-5"></span>
                    </label>
                </div>


                <div class="wrap-input100 validate-input">
                    <input id="phone" class="input100" type="text" name="phone" placeholder="Eg. +1 800 000000">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="lnr lnr-smartphone m-b-2"></span>
                    </label>
                </div>


                <div class="wrap-input100 validate-input">
                    <textarea id="message" class="input100" name="message" placeholder="Your comments..."></textarea>
                    <span class="focus-input100"></span>
                    <label class="label-input100 rs1" for="message">
                        <span class="lnr lnr-bubble"></span>
                    </label>
                </div>

                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
                        Send Now
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>