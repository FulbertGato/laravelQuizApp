<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Gato</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <!-- Bootstrap Css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>
    </head>
 <body>


    <body class="authentication-bg">
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">

                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">

                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Se connecter</h5>
                                    <p class="text-muted">Connectez vous pour continuer</p>
                                </div>
                                <div class="p-2 mt-4">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form  method="post" action="{{route('authenticate')}}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" required name="email">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Mot de passe</label>
                                            <input type="password" class="form-control" required name="password">
                                        </div>
                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Se connecter</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="font-size-14 mb-3 title">Se connecter avec</h5>
                                            </div>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void()" class="social-list-item bg-primary text-white border-primary">
                                                        <i class="mdi mdi-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="{{route('google.auth')}}" class="social-list-item bg-danger text-white border-danger">
                                                        <i class="mdi mdi-google"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <p class="text-muted mb-0">j'ai pas de compte compte ? <a href="{{ url('/register')}}" class="fw-medium text-primary"> S'inscrire'</a></p>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>© <script>document.write(new Date().getFullYear())</script> GROWSTRATEGYZER. Crafted with <i class="mdi mdi-heart text-danger"></i> by gatojunior</p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

        <!-- JAVASCRIPT -->
 <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
 <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
 <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
 <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
 <script src="{{asset('assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
 <script src="{{asset('assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>


 <!-- App js -->
 <script src="{{asset('assets/js/app.js')}}"></script>

</body>

</html>
