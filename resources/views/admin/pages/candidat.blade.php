@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Liste des question</h4>


                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Points</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($candidats as $candidat)
                        <tr>
                            <td>{{$candidat->nom}}</td>
                            <td>{{$candidat->prenom}}</td>
                            <td>{{$candidat->email}}</td>
                            <td>{{$candidat->points}}</td>
                            <td>
                                <a  href="{{url('/candidat/'.$candidat->id)}}"  class="btn btn-success "  >Voirs réponse </a>
                                <a  href="#" class="btn btn-danger" >Supprimer</a>
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
