@extends('layouts.admin')
@section('content')
<!-- start page title -->

<div class="row mb-4">
    <div class="col-xl-4">
        <div class="card h-100">
            <div class="card-body">


                <hr class="my-4">

                <div class="text-muted">
                    <h5 class="font-size-16">About</h5>
                   <div class="table-responsive mt-4">
                        <div>
                            <p class="mb-1">Nom :</p>
                            <h5 class="font-size-16">{{$candidat->nom}}</h5>
                        </div>
                        <div>
                            <p class="mb-1">Prenom :</p>
                            <h5 class="font-size-16">{{$candidat->prenom}}</h5>
                        </div>
                        <div class="mt-4">
                            <p class="mb-1">E-mail :</p>
                            <h5 class="font-size-16">{{$candidat->email}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="card mb-0">

            <div class="tab-content p-4">

                <div class="tab-pane active" id="tasks" role="tabpanel">
                    <div>
                        @foreach ($candidat->results as $res)


                            <h5 class="font-size-16 mb-3">{{$res->question->question}}</h5>

                            <div class="table-responsive">
                                <table class="table table-nowrap table-centered">
                                    <tbody>
                                        @foreach ($res->question->reponses as $rep)
                                        <tr>
                                            <td style="width: 60px;">
                                                <div class="form-check font-size-16 text-center">
                                                    <input type="checkbox" class="form-check-input" disabled  @if ($rep->id == $res->answer_id) checked @endif>

                                                    <label class="form-check-label" ></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="fw-bold text-dark">{{$rep->answer}}</a>
                                            </td>



                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
