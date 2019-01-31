@extends('layout')
@section('title')
Register
@endsection('title')
@section('style')
<style type="text/css">
    .error{
        color: white; 
        width: 100%; 
        background: #E03940;
        border-radius: 10px; 
        padding:10px;
    }
</style>
@endsection('style')
@section('content')
<div class="form-holder">
    <div class="form-content">
        <div class="form-items">
            <h3>ASSIGNMENT ELNUSA.</h3>
            <p>Satu Akun Sejuta Kemudahan</p>
            <div class="page-links">
                <a href="{{ url('/') }}">Login</a>
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
@endsection('content')
@section('js')
<script type="text/javascript" src="/js/jquery.validate.min.js"></script>
@endsection('js')
@section('script')
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

        $.ajax({
            type: 'POST',
            url: 'save_register',
            dataType: 'html',
            data: {
                '_token': $('input[name=_token').val(),
                'username': $("#username").val(),
                'password': $("#password").val(),
                'nama': $("#name").val(),
                'email': $("#email").val()
            },
            success: function(res) {
                // console.log(res);
                if(res==1){
                    alert('Registrasi Berhasil !');
                    window.location.href="/";
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
@endsection('script')