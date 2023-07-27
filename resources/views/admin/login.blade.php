<!DOCTYPE html>
<html lang="en" style="min-height:100%;background-color:#f4f4f4">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrator - Login</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>
    <body>
        <form method="post">
            @csrf
            <div class="login">
                <div class="title-login">
                    <img src="{{ asset('img/mobile-pay1.png')}}" class="img-login">
                    <div class="text-login">LRTOKO - Administrator</div>
                    <div class="clearfix"></div>
                </div>
                <br>
                <div class="welcome-title">Selamat Datang!</div>
                <div class="text-welcome">Login untuk masuk ke aplikasi</div>
                <br>
                <div style="padding:30px">
                    <input type="text" id="username" class="form-control form-login" name="username" placeholder="Username">
                    <br>
                    <input type="password" id="password" class="form-control form-login" name="password" placeholder="Password">
                    <br>
                    <div class="pesan-login" style="color:red"></div>
                    <button type="button" id="submit-login" class="btn btn-primary btn-block" name="login" value="1" style="border-radius:5px;">Login</button>
                </div>
            </div>
        </form>
        <div style="position: fixed;top:0;left:350px;right:0;bottom:0;background: url('{{ asset('img/backgroundlogin.png') }}">
        <div style="position: fixed;top:0;left:350px;right:0;bottom:0;background-color: #00000073;">
            <div style="position:absolute;top:40%;width:100%;padding:0 50px;">
                <div style="max-width:1000px;margin: 0 auto;font-size:1.7em;font-weight:600;color:#fff;text-align:center;"></div>
            </div>
        </div>
        </div>
        <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
        <script type="text/javascript">
            $('#submit-login').click(function(){
                var username = $('#username').val();
                var password = $('#password').val();

                $.ajax({
                    url: '{{ route("action_admin_login") }}',
                    type: 'post',
                    data: {
                        username: username,
                        password: password,
                        _token: $('input[name="_token"]').val()
                    },
                    success: function(data){
                        if(data.message == 'sukses'){
                            window.location.href = "{{ route('dashboard') }}";
                        }else{
                            $('.pesan-login').html('<ul><li>'+data.message+'</li></ul>');
                        }
                    }
                });
            });
        </script>
    </body>
</html>