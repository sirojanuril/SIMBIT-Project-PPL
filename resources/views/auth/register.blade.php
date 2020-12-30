
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
    <title>SIMBIT DAFTAR</title>

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
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Pendaftaran Supplier</h2>
                    <form action="/postregister" method="POST">
                      {{ csrf_field() }}
                        <div class="input-group {{$errors->has('nama_lengkap') ? 'has-error' : ''}}">
                            <input class="input--style-1" type="text" placeholder="Nama Lengkap" name="nama_lengkap" required="" value="{{old('nama_lengkap')}}">
                            @if($errors->has('nama_lengkap'))
                                    <span class="help-block">{{$errors->first('nama_lengkap')}}</span>
                            @endif
                        </div>
                        <div class="input-group {{$errors->has('tanggal_lahir') ? 'has-error' : ''}}">
                            <!-- <label>Tanggal Lahir</label> -->
                            <input class="textbox-n" type="text" onfocus="(this.type='date')" placeholder="Tanggal Lahir" name="tanggal_lahir" required="" value="{{old('tanggal_lahir')}}">
                            @if($errors->has('tanggal_lahir'))
                                <span class="help-block">{{$errors->first('tanggal_lahir')}}</span>
                            @endif
                            <!-- <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i> -->
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                
                                <div class="input-group {{$errors->has('no_hp') ? 'has-error' : ''}}">
                                    <input class="input--style-1" type="number" min="0" required="" placeholder="No Hp" name="no_hp" required="" value="{{old('no_hp')}}">
                                    @if($errors->has('no_hp'))
                                            <span class="help-block">{{$errors->first('no_hp')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6 mt-2">
                                <div class="input-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="jenis_kelamin" required="">
                                            <option disabled="disabled" selected="selected">Jenis Kelamin</option>
                                            <option value="Pria"{{(old('jenis_kelamin') == 'Pria') ? ' selected' : ''}}>Pria</option>
                                            <option value="Wanita"{{(old('jenis_kelamin') == 'Wanita') ? ' selected' : ''}}>Wanita</option>
                                        </select>
                                        @if($errors->has('jenis_kelamin'))
                                          <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                                        @endif
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <input class="input--style-1" type="email" placeholder="Email" name="email" required="" value="{{old('email')}}">
                            @if($errors->has('email'))
                                    <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        
                        <div class="input-group {{$errors->has('alamat') ? 'has-error' : ''}}">
                            <input class="input--style-1" type="text" placeholder="Alamat" name="alamat" required="" value="{{old('alamat')}}">
                            @if($errors->has('alamat'))
                                    <span class="help-block">{{$errors->first('alamat')}}</span>
                            @endif
                        </div>
                        <div class="input-group {{$errors->has('password') ? 'has-error' : ''}}">
                            <input class="input--style-1" type="password" placeholder="Password" name="password" required="" value="{{old('password')}}">
                            @if($errors->has('password'))
                                    <span class="help-block">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                        <div class="input-group {{$errors->has('confirmation') ? 'has-error' : ''}}">
                            <input class="input--style-1" type="password" placeholder="Konfirmasi Password" name="confirmation" required="" value="{{old('confirmation')}}">
                            @if($errors->has('confirmation'))
                                    <span class="help-block">{{$errors->first('confirmation')}}</span>
                            @endif
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn-success" type="submit">DAFTAR</button>
                            <a href="/login" class="btn btn-outline-success">BATAL</a>
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
