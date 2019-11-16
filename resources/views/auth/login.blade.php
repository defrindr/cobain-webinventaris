<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    </head>
    <body>

        <div class="container">
                @if(session()->has('error'))
                    <div class="error">
                        <i class="fa fa-times"></i> {{ session('error') }}
                    </div>
                @endif
            <div class="box">
                <div class="box-head">
                    <div class="title">Login Inventaris Barang</div>
                </div>
                <div class="box-body">
                    <i class="icon fa fa-user"></i>
                    <form action="{{ route('auth.login') }}" method="post" class="form">
                        @csrf
                        @method("POST")
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <div class="anu">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                <span class="fa fa-eye showing"></span>
                            </div>
                        </div>
                        <button class="btn btn-login">Login</button>
                    </form>
                </div>
                <div class="box-footer">
                    &copy;2019
                </div>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script>
            $('.showing').click(function(){
                if($('#password').attr('type') == "password"){
                    $('#password').attr('type','text');
                    $('.showing').attr('class','fa fa-eye-slash showing');
                }else{
                    $('#password').attr('type','password');
                    $('.showing').attr('class','fa fa-eye showing');
                }
            });
            $(".fa.fa-times").click(function(){
                $(".error").remove();
            });
        </script>
    </body>
</html>