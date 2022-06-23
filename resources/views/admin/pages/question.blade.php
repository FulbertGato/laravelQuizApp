@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Liste des question</h4>

                <div class="mt-7 text-end">
                    <a class="btn btn-primary w-sm waves-effect waves-light" href="question/add">Ajouter une nouvelle question</a>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Question</th>
                        <th>Points</th>
                        <th>Nombre de choix</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                        <tr>
                            <td>{{$question->question}}</td>
                            <td>{{$question->points}}</td>
                            <td>{{ count($question->reponses) }}</td>
                            <td>
                                <a  href="#"  class="btn btn-warning"  >Modifier </a>
                                <a  href="{{url('/question/destroy/'.$question->id)}}" class="btn btn-danger" >Supprimer</a>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
