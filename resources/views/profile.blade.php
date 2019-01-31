@extends('layout')
@section('title')
Profile
@endsection('title')
@section('content')
<div class="form-holder">
    <div class="form-content form-sm">
        <div class="form-items">
            <h3 class="form-title">Halo, {{ Session::get('nama') }} !</h3>
            <div class="form-group">
                <h4><strong>Informasi Pribadi Anda</strong></h4>
                <table class="table table-hover" style="margin-top: 20px">
                    <tr>
                        <th>
                            <i class="fa fa-level-up-alt"></i>&nbsp;
                            Username
                        </th>
                        <th>{{ Session::get('username') }}</th>
                    </tr>
                    <tr>
                        <th>
                            <i class="fa fa-user"></i>&nbsp;
                            Nama Lengkap
                        </th>
                        <th>{{ Session::get('nama') }}</th>
                    </tr>
                    <tr>
                        <th>
                            <i class="fa fa-envelope"></i>&nbsp;
                            Email Address
                        </th>
                        <th>{{ Session::get('email') }}</th>
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
@endsection('content')
@section('script')
<script>
    $('#logout').click(function(){
        $.ajax({
            type: 'POST',
            url: 'logout',
            dataType: 'html',
            data: {
                '_token': $('input[name=_token').val(),
                'submit': 'logout'
            },
            success: function(res) {
                alert('Logout Berhasil !');
                window.location.href="/";
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    })
</script>
@endsection('script')
