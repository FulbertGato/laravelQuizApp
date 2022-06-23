<!DOCTYPE HTML>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Type some info">
  <meta name="author" content="Type name">

  <title>Website title - bootstrap html template</title>

  <!-- Bootstrap css -->
  <link href="{{asset('css/bootstrap.css?v=2.0')}}" rel="stylesheet" type="text/css"/>

  <!-- Custom css -->
  <link href="{{asset('css/ui.css?v=2.0')}}" rel="stylesheet" type="text/css"/>
  <link href="{{asset('css/responsive.css?v=2.0')}}" rel="stylesheet" type="text/css"/>

  <!-- Font awesome 5 -->
  <link href="{{asset('fonts/fontawesome/css/all.min.css')}}" type="text/css" rel="stylesheet">

</head>
<body>



<section class="padding-y bg-light">
    <div class="container">
        <div class="row">
            <main class="col-lg-12">
             <!-- ============== COMPONENT FINAL =============== -->
                <article class="card">
                    <div class="card-body">

                        <figure class="mt-4 mx-auto text-center" style="max-width:600px">
                            <svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="round-check">
                                        <circle id="Oval" fill="#D3FFD9" cx="48" cy="48" r="48"></circle>
                                        <circle id="Oval-Copy" fill="#87FF96" cx="48" cy="48" r="36"></circle>
                                        <polyline id="Line" stroke="#04B800" stroke-width="4" stroke-linecap="round" points="34.188562 49.6867496 44 59.3734993 63.1968462 40.3594229"></polyline>
                                    </g>
                                </g>
                            </svg>
                            <figcaption class="my-3">
                                <h4>Merci de votre collaboration</h4>
                                <p>Some information will be written here, bla bla lorem ipsum you enter into any new area of science, you almost always find yourself</p>
                                <!-- The text field -->
                                <input type="text" class=" text-center form-control"value="localhost:8000" id="myInput">

                                <!-- The button used to copy the text -->
                                <button class="mt-2 btn btn-primary" onclick="myFunction()">Copier le lien et patarger</button>
                                <a class="mt-2 btn btn-danger" href="{{url('/logout')}}" >se deconnecter</a>
                            </figcaption>

                        </figure>



                        <br>

                    </div>
                </article>
            </main> <!-- col.// -->
        </div>
    </div> <!-- container end.//  -->
</section>

<script>
    function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>
<!-- Bootstrap js -->
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<!-- Custom js -->
<script src="{{asset('js/script.js?v=1.0')}}"></script>


</body>

</html>
