<?php 
    session_start();
    if(isset($_SESSION['email'])){
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Elnusa | Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme2.css">
</head>
<body>
    <div class="form-body" class="container-fluid">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="images/logo.png" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">

                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>ASSIGNMENT ELNUSA.</h3>
                        <p>Satu Akun Sejuta Kemudahan</p>
                        <div class="page-links">
                            <a href="javascript:void(0)" class="active">Login</a>
                            <a href="register.php">Register</a>
                        </div>
                        <form>
                            <input id="username" class="form-control" type="username" name="username" placeholder="Username" required>
                            <input id="password" class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="login" type="button" class="ibtn">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script>
    $('#login').click(function() {
        var username = $("#username").val();
        var password = $("#password").val();
        $.ajax({
            type: 'POST',
            url: 'backend.php',
            dataType: 'html',
            data: {'username': username,'password': password, 'submit': 'login'},
            success: function(res) {
                // console.log(res);
                if(res==1){
                    alert('Login Berhasil !');
                    window.location.href="profile.php";
                }else{
                    alert('Invalid Username or Password !');
                    document.getElementById('password').value="";
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });
</script>
</body>
</html>