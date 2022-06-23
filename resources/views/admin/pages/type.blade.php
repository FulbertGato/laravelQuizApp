@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Liste des question</h4>


                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Nombre de questions</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type )
                        <tr>
                            <td>{{$type->name}}</td>
                            <td>{{ count($type->questions) }}</td>
                            <td>
                                <a  href="#"  class="btn btn-warning"  >Modifier </a>
                                <a  href="{{url('/type/destroy/'.$type->id)}}" class="btn btn-danger" >Supprimer</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajouter type question</h4>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                    <form class="custom-validation" action="{{route('type.store')}}" method="post" >
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" class="form-control" required name="name" value=""/>
                        </div>

                        <div>
                            <div>

                                <button  type="submit" name="btn_save" class="btn btn-primary waves-effect waves-light me-1">
                                    Ajouter
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect">
                                    Annuler
                                </button>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</div> <!-- end row -->
@endsection
