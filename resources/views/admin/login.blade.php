<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Green Way</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{asset('dashboard/assets/images/favicon.ico')}}">

    <link href="{{asset('dashboard/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('dashboard/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('dashboard/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('dashboard/assets/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
    @toastr_css
</head>
<style>
      body {
        font-family: 'Cairo';
        font-size: 16px;
    }
</style>
<body>

    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="home-btn d-none d-sm-block">
        <a href="{{route('website')}}" class="text-white"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="wrapper-page">
        @include('admin.layouts.notification')
        <div class="card card-pages shadow-none">
            <div class="card-body">
                <div class="text-center m-t-0 m-b-15">
                    <a href="" class="logo logo-admin"><img src="{{asset('dashboard/assets/images/logo-dark.png')}}" alt="" height="24"></a>
                </div>

                <h5 class="font-18 text-center" style="font-family: cairo;">تسجيل الدخول</h5>

                <form class="form-horizontal m-t-30" method="POST" action="{{route('admin.login')}}">
                    @csrf

                    <div class="form-group">
                        <div class="col-12">
                            <label>البريد الإلكترونى</label>
                            <input class="form-control" type="email" name="email" value="{{old('email')}}" placeholder="Username" >
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label>رمز المرور</label>
                            <input class="form-control" type="password" name="password" value="{{old('password')}}" placeholder="Password" >
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <div class="checkbox checkbox-primary">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">تذكرنى</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" name="submit" type="submit">تسجيل الدخول</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <!-- END wrapper -->
    @jquery
    @toastr_js
    @toastr_render
    <!-- jQuery  -->
    <script src="{{asset('dashboard/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/metismenu.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/waves.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('dashboard/assets/js/app.js')}}"></script>
    <script>
        setTimeout(function(){
            $('#alert').slideUp();
        },5000);
    </script>
</body>



</html>