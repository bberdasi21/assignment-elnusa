<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Elnusa | Register</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme2.css">
    <style type="text/css">
        .error{
            color: white; 
            width: 100%; 
            background: #E03940; 
            border-radius: 10px; 
            padding:10px;
        }
    </style>
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
                            <a href="index.php">Login</a>
                            <a href="javascript:void(0)" class="active">Register</a>
                        </div>
                        <form id="form_register">
                            <input name="username" class="form-control" type="text" id="username" placeholder="Username" minlength="4" required>
                            <input name="name" class="form-control" type="text" id="name" placeholder="Full Name" required>
                            <input name="email" class="form-control" type="email" id="email" placeholder="E-mail Address" required>
                            <input name="password" class="form-control" type="password" id="password" placeholder="Password" required>
                            <input name="confirm_password" class="form-control" type="password" id="confirm_password" placeholder="Confirm Password" required>
                            <div class="row" style="margin: 0px">
                                <span id="error_pass" class="error" style="display: none"></span>
                            </div>
                            <div class="form-button" style="margin: 10px">
                                <button id="register" type="button" class="ibtn">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script>
    var password = document.getElementById("password")
    var confirm_password = document.getElementById("confirm_password");
    var valid_pass = false;

    password.onchange = validate_pass;
    confirm_password.onkeyup = validate_pass;

    $('#register').click(function() {
        var register_form = $('#form_register');
        register_form.validate()
        register_form.valid()
        
        if(!valid_pass){
            return 0;
        }
        
        var username = $("#username").val();
        var email = $("#email").val();
        var name = $("#name").val();
        var password = $("#password").val();

        $.ajax({
            type: 'POST',
            url: 'backend.php',
            dataType: 'html',
            data: {
                'username': username,
                'password': password,
                'nama': name,
                'email': email,
                'submit': 'register'
            },
            success: function(res) {
                console.log(res);
                if(res==1){
                    alert('Registrasi Berhasil !');
                    window.location.href="index.php";
                }else{
                    alert('Username Sudah Digunakan !');
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });
    function validate_pass(){
        if(password.value != confirm_password.value) {
            valid_pass = false;
            $('#error_pass').html("<i class='fa fa-exclamation-triangle'></i>&nbsp;Passwords Didn't Match");
            $('#error_pass').css('display','block');
        } else {
            valid_pass = true;
            $('#error_pass').empty();
            $('#error_pass').css('display','none');
        }
    }
</script>
</body>
</html>