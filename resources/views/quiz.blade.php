
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
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Questions </h4>
                            <form method="post" action="{{route('quiz.add')}}">
                                @csrf
                                <div class="row">
                                    @foreach ($questions as $question)
                                    <div class="col-md-12 mt-5">
                                        <div>
                                            <h5 class="font-size-14 mb-4">{{$question->question}}</h5>
                                            @foreach ($question->reponses as $reponse)


                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio" name="{{$question->id}}" value="{{$reponse->id}}">
                                                <label class="form-check-label" >
                                                   {{$reponse->answer}}
                                                </label>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block">Soumettre</button>
                                    </div>
                                </div>
                            </form>
                            </div>
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
