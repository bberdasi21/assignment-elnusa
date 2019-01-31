@extends('layout')
@section('title')
Login
@endsection('title')
@section('content')
<div class="form-holder">
    <div class="form-content">
        <div class="form-items">
            <h3>ASSIGNMENT ELNUSA.</h3>
            <p>Satu Akun Sejuta Kemudahan</p>
            <div class="page-links">
                <a href="javascript:void(0)" class="active">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            </div>
            <form class="form-horizontal">
                <input id="username" class="form-control" type="username" name="username" placeholder="Username" required>
                <input id="password" class="form-control" type="password" name="password" placeholder="Password" required>
                <div class="form-button">
                    <button id="login" type="button" class="ibtn">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection('content')
@section('script')
<script>
    $('#login').click(function() {
        $.ajax({
            type: 'POST',
            url: 'login',
            dataType: 'html',
            data: {
                'username': $("#username").val(),
                'password': $("#password").val(),
                '_token': $('input[name=_token').val(),
            },
            success: function(res) {
                // console.log(res);
                if(res==1){
                    alert('Login Berhasil !');
                    window.location.href="profile";
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
@endsection('script')