<?php 
    session_start();
    if(!isset($_SESSION['email'])){
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Elnusa | Profile</title>
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
            </div>
            <div class="form-holder">
                <div class="form-content form-sm">
                    <div class="form-items">
                        <h3 class="form-title">Halo, <?= $_SESSION['nama'] ?> !</h3>
                        <div class="form-group">
                            <h4><strong>Informasi Pribadi Anda</strong></h4>
                            <table class="table table-hover" style="margin-top: 20px">
                                <tr>
                                    <th>
                                        <i class="fa fa-level-up-alt"></i>&nbsp;
                                        Username
                                    </th>
                                    <th><?= $_SESSION['username'] ?></th>
                                </tr>
                                <tr>
                                    <th>
                                        <i class="fa fa-user"></i>&nbsp;
                                        Nama Lengkap
                                    </th>
                                    <th><?= $_SESSION['nama'] ?></th>
                                </tr>
                                <tr>
                                    <th>
                                        <i class="fa fa-envelope"></i>&nbsp;
                                        Email Address
                                    </th>
                                    <th><?= $_SESSION['email'] ?></th>
                                </tr>
                            </table>
                            <button class="btn" id="logout">
                                <i class="fa fa-sign-out-alt"></i>&nbsp;
                                Logout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script>
    $('#logout').click(function(){
        $.ajax({
            type: 'POST',
            url: 'backend.php',
            dataType: 'html',
            data: {'submit': 'logout'},
            success: function(res) {
                alert('Logout Berhasil !');
                window.location.href="index.php";
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    })
</script>
</body>
</html>