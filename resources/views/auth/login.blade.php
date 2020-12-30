
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>SIMBIT MASUK</title>

    <!-- Icons font CSS-->
    <link href="{{asset('form/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('form/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('form/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('form/vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('form/css/main.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                @if(session('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="opacity: 90%;">
                    <strong> {{ session('danger') }} </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="opacity: 90%;">
                    <strong> {{ session('success') }} </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">SIMBIT LOGIN</h2>
                    <form action="{{route('postlogin')}}" method="POST">
                      {{ csrf_field() }}
                        <div class="input-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <input class="input--style-1" type="email" placeholder="Email" required="" name="email">
                            @if($errors->has('email'))
                                    <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>


                        <div class="input-group {{$errors->has('password') ? 'has-error' : ''}}">
                            <input class="input--style-1" type="password" placeholder="Password" required="" name="password">
                            @if($errors->has('password'))
                                    <span class="help-block">{{$errors->first('password')}}</span>
                            @endif
                        </div>

                        <div class="p-t-20">
                            <button class="btn btn-primary" type="submit">Masuk</button>
                            <a href="/register" class="btn btn-success">Daftar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Jquery JS-->
    <script src="{{asset('form/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{asset('form/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('form/vendor/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('form/vendor/datepicker/daterangepicker.js')}}"></script>

    <!-- Main JS-->
    <script src="{{asset('form/js/global.js')}}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
